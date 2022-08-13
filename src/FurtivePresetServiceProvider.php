<?php

namespace Skys215\FurtivePreset;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class FurtivePresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        UiCommand::macro('furtive', function (UiCommand $command) {
            $adminLTEPreset = new FurtivePreset($command);
            $adminLTEPreset->install();

            $command->info('Furtive scaffolding installed successfully.');

            if ($command->option('auth')) {
                $adminLTEPreset->installAuth();
                $command->info('Furtive CSS auth scaffolding installed successfully.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        UiCommand::macro('furtive-localized', function (UiCommand $command) {
            $adminLTEPreset = new FurtiveLocalizedPreset($command);
            $adminLTEPreset->install();

            $command->info('Furtive scaffolding installed successfully with localization.');

            if ($command->option('auth')) {
                $adminLTEPreset->installAuth();
                $command->info('Furtive CSS auth scaffolding installed successfully with localization.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        UiCommand::macro('furtive-fortify', function (UiCommand $command) {
            $fortifyFurtivePreset = new FurtivePreset($command, true);
            $fortifyFurtivePreset->install();

            $command->info('Furtive scaffolding installed successfully for Laravel Fortify.');

            if ($command->option('auth')) {
                $fortifyFurtivePreset->installAuth();
                $command->info('Furtive CSS auth scaffolding installed successfully for Laravel Fortify.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        if (class_exists(Fortify::class)) {
            Fortify::loginView(function () {
                return view('auth.login');
            });

            Fortify::registerView(function () {
                return view('auth.register');
            });

            Fortify::confirmPasswordView(function () {
                return view('auth.passwords.confirm');
            });

            Fortify::requestPasswordResetLinkView(function () {
                return view('auth.passwords.email');
            });

            Fortify::resetPasswordView(function () {
                return view('auth.passwords.reset');
            });

            Fortify::verifyEmailView(function () {
                return view('auth.verify');
            });
        }
    }
}
