<?php

namespace App\Traits;

use App\Models\AdminNotification;

trait CreatesNotifications
{
    /**
     * Create a portfolio notification
     */
    protected function createPortfolioNotification($action, $portfolioTitle, $portfolioId = null)
    {
        $messages = [
            'create' => "Portofolio baru '{$portfolioTitle}' berhasil ditambahkan",
            'update' => "Portofolio '{$portfolioTitle}' berhasil diperbarui",
            'delete' => "Portofolio '{$portfolioTitle}' berhasil dihapus",
            'upload' => "Gambar portofolio '{$portfolioTitle}' berhasil diupload"
        ];

        $icons = [
            'create' => 'fas fa-plus-circle',
            'update' => 'fas fa-edit',
            'delete' => 'fas fa-trash',
            'upload' => 'fas fa-upload'
        ];

        AdminNotification::create_notification(
            auth()->id(),
            'Portofolio ' . ucfirst($action),
            $messages[$action] ?? "Aksi portofolio {$action} berhasil",
            'portfolio',
            $icons[$action] ?? 'fas fa-briefcase',
            $action,
            $portfolioId,
            'Portfolio'
        );
    }

    /**
     * Create a navbar notification
     */
    protected function createNavbarNotification($action = 'update')
    {
        AdminNotification::create_notification(
            auth()->id(),
            'Navbar Settings Updated',
            'Pengaturan navbar berhasil diperbarui',
            'navbar',
            'fas fa-bars',
            $action,
            null,
            'NavbarSettings'
        );
    }

    /**
     * Create a website settings notification
     */
    protected function createWebsiteNotification($action = 'update')
    {
        AdminNotification::create_notification(
            auth()->id(),
            'Website Settings Updated',
            'Pengaturan website berhasil diperbarui',
            'website',
            'fas fa-cogs',
            $action,
            null,
            'WebsiteSettings'
        );
    }

    /**
     * Create a contact settings notification
     */
    protected function createContactNotification($action = 'update')
    {
        AdminNotification::create_notification(
            auth()->id(),
            'Contact Settings Updated',
            'Pengaturan kontak berhasil diperbarui',
            'contact',
            'fas fa-address-book',
            $action,
            null,
            'ContactSettings'
        );
    }

    /**
     * Create an about page notification
     */
    protected function createAboutNotification($action = 'update')
    {
        AdminNotification::create_notification(
            auth()->id(),
            'About Page Updated',
            'Halaman tentang berhasil diperbarui',
            'about',
            'fas fa-info-circle',
            $action,
            null,
            'AboutPage'
        );
    }

    /**
     * Create an account settings notification
     */
    protected function createAccountNotification($action, $type = 'profile')
    {
        $messages = [
            'profile' => 'Profil akun berhasil diperbarui',
            'password' => 'Password akun berhasil diubah'
        ];

        AdminNotification::create_notification(
            auth()->id(),
            'Account ' . ucfirst($action),
            $messages[$type] ?? 'Pengaturan akun berhasil diperbarui',
            'account',
            'fas fa-user-cog',
            $action,
            auth()->id(),
            'User'
        );
    }

    /**
     * Create a system notification
     */
    protected function createSystemNotification($title, $message, $icon = 'fas fa-bell')
    {
        AdminNotification::create_notification(
            auth()->id(),
            $title,
            $message,
            'system',
            $icon,
            'system',
            null,
            'System'
        );
    }
}