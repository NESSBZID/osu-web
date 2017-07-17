{{--
    Copyright 2015-2017 ppy Pty. Ltd.

    This file is part of osu!web. osu!web is distributed with the hope of
    attracting more community contributions to the core ecosystem of osu!.

    osu!web is free software: you can redistribute it and/or modify
    it under the terms of the Affero GNU General Public License version 3
    as published by the Free Software Foundation.

    osu!web is distributed WITHOUT ANY WARRANTY; without even the implied
    warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
    See the GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with osu!web.  If not, see <http://www.gnu.org/licenses/>.
--}}
@extends("rankings.index")

@section("scores")
    <table class="ranking-page-table">
        <thead>
            <tr>
                <th class="ranking-page-table__heading"></th>
                <th class="ranking-page-table__heading ranking-page-table__heading--main"></th>
                <th class="ranking-page-table__heading">
                    {{ trans('rankings.stat.accuracy') }}
                </th>
                <th class="ranking-page-table__heading">
                    {{ trans('rankings.stat.play_count') }}
                </th>
                <th class="ranking-page-table__heading ranking-page-table__heading--focused">
                    {{ trans('rankings.stat.performance') }}
                </th>
                <th class="ranking-page-table__heading ranking-page-table__heading--grade">
                    {{ trans('rankings.stat.ss') }}
                </th>
                <th class="ranking-page-table__heading ranking-page-table__heading--grade">
                    {{ trans('rankings.stat.s') }}
                </th>
                <th class="ranking-page-table__heading ranking-page-table__heading--grade">
                    {{ trans('rankings.stat.a') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($scores as $index => $score)
                <tr class="ranking-page-table__row{{$score->user->isActive() ? '' : ' ranking-page-table__row--inactive'}}">
                    <td class="ranking-page-table__column ranking-page-table__column--rank">
                        #{{ $scores->firstItem() + $index }}
                    </td>
                    <td class="ranking-page-table__column">
                        <a class="ranking-page-table__user-link" href="{{route('users.show', $score->user_id)}}">
                            @include('objects._country_flag', [
                                'country_name' => $score->user->country->name,
                                'country_code' => $score->user->country->acronym,
                            ])
                            <span class="ranking-page-table__user-link-text js-usercard" data-user-id="{{$score->user_id}}" data-tooltip-position="right center">
                                {{ $score->user->username }}
                            </span>
                        </a>
                    </td>
                    <td class="ranking-page-table__column ranking-page-table__column--dimmed">
                        {{ format_percentage($score->accuracy_new) }}
                    </td>
                    <td class="ranking-page-table__column ranking-page-table__column--dimmed">
                        {{ number_format($score->playcount) }}
                    </td>
                    <td class="ranking-page-table__column ranking-page-table__column--focused">
                        {{ number_format(round($score->rank_score)) }}
                    </td>
                    <td class="ranking-page-table__column ranking-page-table__column--dimmed">
                        {{ number_format(max(0, $score->x_rank_count)) }}
                    </td>
                    <td class="ranking-page-table__column ranking-page-table__column--dimmed">
                        {{ number_format(max(0, $score->s_rank_count)) }}
                    </td>
                    <td class="ranking-page-table__column ranking-page-table__column--dimmed">
                        {{ number_format(max(0, $score->a_rank_count)) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
