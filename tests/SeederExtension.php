<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

declare(strict_types=1);

namespace Tests;

use App\Models\Group;
use PHPUnit\Runner\AfterLastTestHook;
use PHPUnit\Runner\BeforeFirstTestHook;

class SeederExtension implements AfterLastTestHook, BeforeFirstTestHook
{
    public function executeAfterLastTest(): void
    {
        TestCase::withDbAccess(function () {
            Group::truncate();
        });
    }

    public function executeBeforeFirstTest(): void
    {
        TestCase::withDbAccess(function () {
            Group::truncate();
            foreach (Group::PRIV_GROUPS as $identifier) {
                Group::create([
                    'group_desc' => '',
                    'group_name' => $identifier,
                    'group_type' => 2,
                    'identifier' => $identifier,
                    'short_name' => $identifier,
                ]);
            }
        });
    }
}
