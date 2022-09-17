<?php

use MBarlow\Megaphone\Livewire\Megaphone;

it('can render the megaphone component with no logged in user', function () {
    $this->livewire(Megaphone::class)
        ->assertViewIs('megaphone::megaphone')
        ->assertSeeHtml($this->bellSvgIcon());
});

it('can render the megaphone component with logged in user', function () {
    $this->actingAs(
        $this->createTestUser()
    );

    $this->livewire(Megaphone::class)
        ->assertViewIs('megaphone::megaphone')
        ->assertSeeHtml($this->bellSvgIcon());
});

it('can render the megaphone component with notification count', function () {
    $this->actingAs(
        $user = $this->createTestUser()
    );

    $this->createTestNotification(
        $user,
        \MBarlow\Megaphone\Types\General::class
    );

    $this->livewire(Megaphone::class)
        ->assertViewIs('megaphone::megaphone')
        ->assertSeeHtml('<div class="absolute -left-2 -top-2 w-6 h-6 inline-block text-center text-sm rounded-full text-white bg-red-600">
            <span class="p-1.5">
                1
            </span>
        </div>');
});

it('can load announcements', function () {
    $this->actingAs(
        $user = $this->createTestUser()
    );

    $this->createTestNotification(
        $user,
        \MBarlow\Megaphone\Types\General::class
    );
    $this->createTestNotification(
        $user,
        \MBarlow\Megaphone\Types\Important::class
    );
    $user->unreadNotifications->first()->markAsRead();

    $this->livewire(Megaphone::class)
        ->call('loadAnnouncements', $user)
        ->assertSet('unread', $user->unreadNotifications()->get())
        ->assertSet('announcements', $user->readNotifications);
});

it('can mark notification as read', function () {
    $this->actingAs(
        $user = $this->createTestUser()
    );

    $this->createTestNotification(
        $user,
        \MBarlow\Megaphone\Types\General::class
    );
    $this->createTestNotification(
        $user,
        \MBarlow\Megaphone\Types\Important::class
    );
    $notification = $user->unreadNotifications->first();

    $this->livewire(Megaphone::class)
        ->call('markAsRead', $notification)
        ->assertSet('unread', $user->unreadNotifications()->get())
        ->assertSet('announcements', $user->readNotifications);
});