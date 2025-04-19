Application name: SupaMail
Description: This is an email app. There are 3 main features included
    1- Sending Emails
    2- Seeing Emails you sent
    3- Seeing Emails you have sent

To set the app up, put the folder into htdocs if you're using XAMPP. You'll be redirected on the homepage where you can navigate the app from.

Features Implemented:
    - Users account stored in user_info and login tables
    - Password stored using a hashing function
    - Sessions used to maintain authentication state
    - Logout feature (session data is deleted)
    - Last time user logged in implemented
    - Inbox view to display emails received by logged-in user
    - Sent emails to display emails sent by logged-in user
    - Emails include sender, recipient, subject, and message body
    - Emails retrieved using the fetch API
    - Inbox polls the server every minute
    - Emails stored in database upon sending
    - Separate API endpoints included

Images used from https://www.svgrepo.com/


I choose this file structure because I felt like it made more sense and is more understandable. The folders clearly indicate
what type of files you could find in them. I also chose this file structure because I had some issues with the filepaths, but I resolved that.
That was probably because it was deorganized, so I used this structure because it makes it more simple for me and is easy to understand by others.