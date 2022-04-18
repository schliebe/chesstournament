# Database
The database consists of the following tables:
- User
- Round
- Match
- Game

## User
The User table has the following columns:\
`user_id` is the id of the user.\
`username` is the username of the user.\
`password` is the encrypted password of the user.\
`admin` is set to 1 if the user is an admin, 0 otherwise.

## Round
The Round table has the following columns:\
`round_id` is the id of the round.\
`round_name` is the name of the round.\
`season` is the season this is a part of.

## Match
The Match table has the following columns:\
`match_id` is the id of the match.\
`player1` is the `user_id` of the first player. Can be NULL.\
`player2` is the `user_id` of the second player. Can be NULL.\
`round` is the `round_id` of the tournament round this is a part of. Can be NULL.\
`bracket_pos` is the position in the playoff bracket. Can be NULL.\
`completed` is set to 1 if the match is completed, 0 otherwise.

## Game
The Game table has the following columns:\
`game_id` is the id of the game.\
`match` is the `match_id` of the match this is a part of.\
`player_white` is the `user_id` of the user that is playing with white.\
`player_black` is the `user_id` of the user that is playing with black.\
`result_white` is the result of the game with `1` meaning win, `-1` meaning lose and `0` meaning a draw. Can be NULL.\
`result_black` is the result of the game with `1` meaning win, `-1` meaning lose and `0` meaning a draw. Can be NULL.\
`lichess_id` is the id of the lichess game (lichess.org/`[lichess_id]`). Can be NULL.\
`played` is set to 1 if the game has been played, 0 otherwise.
