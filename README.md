# Basic-PHP-CMS


### Updates

##### 12/31/2019

[x] Wrap adminBar in a single function.

[x] Added Members Page

##### 12/28/2019

[x] Added dynamic URL handling

[x] Fixed formatting of Posts Page

[x] Started basics of page/domain generation

##### 12/27/2019

[x] Added User Roles

[x] Reconfigure SQLite table structure/logic

[x] Added home link to header image

[x] Commented all code

##### 12/26/2019

[x] Cleaned up file organization.

##### 12/25/2019

[x] Add "user already logged in" functionality.

[x] added logout functionality (user-logout.php)

[x] Fixed bug #0001 

##### 12/24/2019

[x] login page functionality (try-login.php)

[x] added logged in/out session variables

[x] cleaned up design of header

[x] added admin bar, log in/out buttons.

[x] Custom style sheet should override bootstrap

##### 12/22/2019

[x] added sqlite connection and basic db

[x] added login page

[x] added basic user registration functionality


#### To Do: 

###### Modules

[ ] Survey module

[ ] Finish Daily Recap module

[ ] Finish Data Entry module

[ ] Make modules collapsible.

[ ] Data visualization component

###### Members Page

[ ] Center results on page

[ ] Decide relevant information to return in a basic search, and how to link to a full member profile (editable depending on role).

[ ] Break up results into a set number of returned members (50 per page, etc.)

[ ] Add member search in visitor survey module


###### Structure/Logic

[ ] Decide what should be styled via bootstrap args and what should be styled via CSS.

[ ] Add default custom class names and IDs to each element - should be tied in with 4ww branding...?

[ ] Wrap header in a single 4ww_header function.

[ ] Eliminate index.php - make it a routing page that redirects to dashboard.

[ ] Define a structure for user roles (This should exist in documentation)

###### Server/Architecture

[ ] Figure out server solution. How does Apache work?

###### Database

[ ] Reconfigure session variables to be object pulled from DB.

[ ] Database security measures. Should probably be encrypted.

###### Design/GUI 

[ ] Make GUI for appending custom stylesheet so it doesn't have to be done in a code editor.

### Bugs and Fixes

##### Fixes

[x] #0001 user-register is not inserting values into database. 12/25/2019 PW

##### Bugs


[ ] #0002 try-login does not redirect when username does not exist in database
# FourWhiteWalls_MMS
