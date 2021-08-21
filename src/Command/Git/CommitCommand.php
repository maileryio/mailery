<?php

namespace Mailery\Command\Git;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Yiisoft\Yii\Console\ExitCode;
use CzProject\GitPhp\Git;
use Symfony\Component\Console\Input\InputOption;

class CommitCommand extends Command
{
    /**
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->setDescription('Add and commit changes into each package repository.')
            ->setHelp('Add and commit changes into each package repository.')
            ->addOption('path', '--path', InputOption::VALUE_REQUIRED, 'Path to vendor folder')
            ->addOption('message', '--message', InputOption::VALUE_REQUIRED, 'Commit message');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $path = $input->getOption('path');
        $message = $input->getOption('message');

        if (!is_dir($path)) {
            throw new \RuntimeException('Directory does not exists ' . $path);
        }

        $directories = glob($path . '/maileryio/*' , GLOB_ONLYDIR);

        foreach ($directories as $directory) {
            $repo = (new Git())->open($directory);

            $repoName = trim(substr($repo->getRepositoryPath(), strlen($path)), '/');
            $output->writeln("<info>Process repo <fg=yellow>{$repoName}</></info>");

            $repo->checkout('master');

            if ($repo->hasChanges()) {
                $repo->addAllChanges();
                $repo->commit($message);
            }

            $repo->push('origin', ['master', '-u']);

            $output->writeln("<info>Pushed repo <fg=yellow>{$repoName}</> to branch <fg=yellow>{$repo->getCurrentBranchName()}</></info>");
        }

        return ExitCode::OK;
    }
}
