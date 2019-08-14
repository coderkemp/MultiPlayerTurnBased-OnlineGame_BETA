# SnakesLaddersGameProject
Turn Based Game using PHP, AJAX, Javascript

- The Game is a AJAX driven, PHP/MySQL back ended game.
- The environment is dynamically created using PHP & MySQL Database(Used prepared statements to test data against DB).
- Chat Feature implemented using AJAX.
- Made use of PHP Sessions.

                                                   CODE-FLOW
                                     -------------------------------------------
                                     
 1. User enters the WelcomePage.html, onClick() directs to the Snake&Ladder Login & Registration page i.e snakeLadder.php
 
 2. On entering the details for registering, call goes to ConnectToDB.php which will insert values into the UserTable. I am using $_SESSION 
 to store the present user session.
 
 3. Once the user logs in, from the loginlogout.js page there is a call to CheckLogin.php which prompts to click on the multiplayer button to enter chat room.
 Once the user enters the waiting room, here I am using various concepts of sessions/ajax calls. We can see the list of players through the php code to retrieve from DB.
 
 4. User selects the opponent, opponent gets updated in the DB and user enters the page.
 
 5. I am saving the chats in a chat-table.
 
 Why Prepared Statements?
 - Dynamic & Faster execution
 - Helps to prevent SQL injection attacks
 
 Used PDO(PHP Data Objects) to connect to the DB. This makes sure that all the database inputs will be treated as text strings.
 
 AJAX?
 - Helps to get the data from the database without refreshing the browser. Like in the game, how the chat population is being done in the waiting-room page.
 
 PHP Sessions?
 - A session is a way to store information to be used across multiple pages.
 - A session is started with the session_start() function.
 - Session variables are set with the PHP global variable: $_SESSION.
 - The Session_Start() must be the very first thing in the document, before any html tags.
