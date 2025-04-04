// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import CountryJson from './country-json';
import DailyChallengeUserStatsJson from './daily-challenge-user-stats-json';
import ProfileBannerJson from './profile-banner';
import RankHighestJson from './rank-highest-json';
import RankHistoryJson from './rank-history-json';
import SeasonStatsJson from './season-stats-json';
import TeamJson from './team-json';
import UserAccountHistoryJson from './user-account-history-json';
import UserAchievementJson from './user-achievement-json';
import UserBadgeJson from './user-badge-json';
import UserCoverJson from './user-cover-json';
import UserGroupJson from './user-group-json';
import UserMonthlyPlaycountJson from './user-monthly-playcount-json';
import UserPreferencesJson from './user-preferences-json';
import UserRelationJson from './user-relation-json';
import UserReplaysWatchedCountJson from './user-replays-watched-count-json';
import UserStatisticsJson from './user-statistics-json';
import UserStatisticsRulesetsJson from './user-statistics-rulesets-json';

interface UserJsonAvailableIncludes {
  account_history: UserAccountHistoryJson[];
  active_tournament_banner: ProfileBannerJson | null;
  active_tournament_banners: ProfileBannerJson[];
  badges: UserBadgeJson[];
  beatmap_playcounts_count: number;
  blocks: UserRelationJson[];
  comments_count: number;
  country: CountryJson | null;
  cover: UserCoverJson;
  current_season_stats: SeasonStatsJson | null;
  daily_challenge_user_stats: DailyChallengeUserStatsJson;
  favourite_beatmapset_count: number;
  follow_user_mapping: number[];
  follower_count: number;
  friends: UserRelationJson[];
  graveyard_beatmapset_count: number;
  groups: UserGroupJson[];
  guest_beatmapset_count: number;
  is_admin: boolean;
  is_bng: boolean;
  is_full_bn: boolean;
  is_gmt: boolean;
  is_limited_bn: boolean;
  is_moderator: boolean;
  is_nat: boolean;
  is_restricted: boolean;
  is_silenced: boolean;
  loved_beatmapset_count: number;
  mapping_follower_count: number;
  monthly_playcounts: UserMonthlyPlaycountJson[];
  nominated_beatmapset_count: number;
  page: {
    html: string;
    raw: string;
  };
  pending_beatmapset_count: number;
  previous_usernames: string[];
  rank_highest: RankHighestJson | null;
  rank_history: RankHistoryJson | null;
  ranked_beatmapset_count: number;
  replays_watched_counts: UserReplaysWatchedCountJson[];
  scores_best_count: number;
  scores_first_count: number;
  scores_pinned_count: number;
  scores_recent_count: number;
  statistics: UserStatisticsJson;
  statistics_rulesets: UserStatisticsRulesetsJson;
  support_level: number;
  team: TeamJson;
  unread_pm_count: number;
  user_achievements: UserAchievementJson[];
  user_preferences: UserPreferencesJson;
}

interface UserJsonDefaultAttributes {
  avatar_url: string;
  country_code: string; // TODO: country object?
  default_group: string | null;
  id: number;
  is_active: boolean;
  is_bot: boolean;
  is_deleted: boolean;
  is_online: boolean;
  is_supporter: boolean;
  last_visit: string | null;
  pm_friends_only: boolean;
  profile_colour: string | null;
  username: string;
}

export type ProfileHeaderIncludes =
  | 'active_tournament_banner'
  | 'active_tournament_banners'
  | 'badges'
  | 'comments_count'
  | 'follower_count'
  | 'groups'
  | 'mapping_follower_count'
  | 'previous_usernames'
  | 'support_level';

type UserJson = UserJsonDefaultAttributes & Partial<UserJsonAvailableIncludes>;

export default UserJson;

// FIXME: Using Partial isn't quite correct as the keys are there but the values are null.
export type UserJsonDeleted = Partial<UserJson> & { username: string };
