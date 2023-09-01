# Starter-level CRUD APP
# Topic
This is a beginner-level PHP application.
It is a simple starting point for those who want to create a web page with CRUD (Create, Read, Update, Delete) features connected to MySql.

# Database
We create a MySql database named "users" using phpMyAdmin. Within this database, we create a table named "users" and add 5 columns:

1. "id" int(11) Auto_Increment
2. "User_name" varchar(250)
3. "email" varchar(250)
4. "password" varchar(250)
5. "user_type" varchar(250)
After logging in, we prepare our "nodejs_comment" database for leaving comments. We add 3 columns:
1. "id" int(20)
2. "user_name" varchar(300)
3. "comment" varchar(300)
We repeat this process twice more, naming the tables "php_comment" and "python_comment."
File Structure

```
CRUD APP
├── admin 
└── image
```
# Details
The index.php page contains a navbar and a Welcome section. The navbar includes Sign In and Log In options.

# Sign In
The Sign In page includes typical inputs for First Name, Last Name, Email Address, Password, and Password Confirmation. These inputs are both set as "Required" in HTML and dynamically validated using PHP code. If incorrect or incomplete information is entered, appropriate alerts are shown. To prevent the use of the same email address twice, we ensure that the email address in the MySql database is unique. After confirming the match of the password and its confirmation, the accepted password is encrypted using the Password_hash feature and then stored in the database.

# Log In
On the Log In page, we enter the previously registered Name, Surname, and Password to complete the login process. Additionally, a "Show Password" option is available to make the password visible, enhancing user-friendliness. PHP warnings are also provided for incorrect input.

# User Access
Regular users can access information pages for various topics. Clicking on a topic opens a page with details, and at the bottom, there's a dynamic comment section where users can leave comments. The comments made are automatically listed at the bottom of the page.

# Admin Access (Authorized through the database)
Once logged in as an admin, users can access the control panel from the navbar. In the control panel, new users can be added or existing user accounts can be deleted. Admins can also edit usernames and email addresses of existing users.

# Control Panel
Admins have access to this page, where they can add new users, delete user accounts, and modify the usernames and email addresses of existing users.

# Application Information
I developed this application during my internship at Train Payment Inc. (PAYGURU) from August 1st, 2023, to August 28th, 2023.

# License
This project is licensed under the MIT License. See the LICENSE.md file for details.

# Images
![Ekran görüntüsü 2023-08-29 152000](https://github.com/omerkilic-0/Starter-level_CRUD-APP/assets/123635257/67803042-4d7d-4f6a-97ff-11baba9118a1)
![Ekran görüntüsü 2023-08-29 152008](https://github.com/omerkilic-0/Starter-level_CRUD-APP/assets/123635257/7bef9e48-c2fa-4939-ba1b-09f2cd5e47f7)
![Ekran görüntüsü 2023-08-29 152014](https://github.com/omerkilic-0/Starter-level_CRUD-APP/assets/123635257/c7750ccd-8639-4ca7-972b-ba7c533b5038)
![Ekran görüntüsü 2023-08-29 152027](https://github.com/omerkilic-0/Starter-level_CRUD-APP/assets/123635257/f61c6c49-a85b-4ff9-9833-122240370bbb)
![Ekran görüntüsü 2023-08-29 152054](https://github.com/omerkilic-0/Starter-level_CRUD-APP/assets/123635257/238c7637-0ee5-445c-8ee6-ea5559a9db08)
