create table User
(
    user_id   INTEGER not null
        primary key autoincrement
        unique,
    username  TEXT    not null
        unique,
    password  TEXT    not null,
    is_player INTEGER default 1 not null,
    is_admin  INTEGER default 0 not null
);

create table Round
(
    round_id   INTEGER not null
        primary key autoincrement
        unique,
    round_name TEXT    not null,
    season     INTEGER not null
);

create table Match
(
    match_id    INTEGER not null
        primary key autoincrement
        unique,
    player1     INTEGER
        references User(user_id),
    player2     INTEGER
        references User(user_id),
    round       INTEGER
        references Match(match_id),
    bracket_pos INTEGER,
    completed   INTEGER default 0 not null
);

create table Game
(
    game_id      INTEGER not null
        primary key autoincrement
        unique,
    match        INTEGER not null
        references Match(match_id),
    player_white INTEGER not null
        references User(user_id),
    player_black INTEGER not null
        references User(user_id),
    result_white INTEGER,
    result_black INTEGER,
    lichess_id   TEXT    not null,
    played       INTEGER default 0 not null
);