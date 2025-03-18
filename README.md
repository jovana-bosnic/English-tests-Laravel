The English language knowledge testing application is built in Laravel. 
It is intended for users who want to register and gain the ability to solve tests and track their results. A registration and login page is available to users.
On the homepage, the most important information about the tests, categories, and available learning content for all users can be seen.
The "Reminders" page is an image gallery, featuring the most important rules for learning English, which is also accessible to unregistered users.
In the footer of the site, there is a contact form, which all users can use for their questions or comments. Users who are not logged in must enter their email address in order to receive a response to their message.
The "All Tests" page requires the user to be registered, as this page contains all the tests, divided by categories. 
Below each test link, there are results the user has achieved, shown as a success percentage and the date the test was taken. This way, the user can track their progress in specific areas. 
To make test searches easier, filtering by category or test name is available.
Tests consist of multiple exercises, and each exercise can have multiple questions. 
Specific tasks are solved by entering answers into fields marked with a bottom line or by selecting the given answer. At the end of the test, by pressing the "Check answers" button, the user will get the number of correct answers, along with an indication of which tasks were answered correctly. 
Below the incorrectly answered tasks, an explanation will be displayed, showing how the task should have been completed. 
This way, the user can improve their knowledge and, when taking the test again, will likely achieve better results.
Access to the admin panel is only granted if the user has the admin role.
The panel includes statistics important for tracking overall user results, such as the most popular test, the test where users achieve the best results, and the test with the worst performance. 
Based on this data, the admin can gain insights into user needs, what interests them most, and which areas require additional learning.
The admin can add new categories, new tests, as well as modify or permanently delete existing ones. 
There is also an option to upload new images, which are added as learning content on the "Reminders" page, and existing images can be deleted.
Finally, a table displaying users' messages and their email addresses is shown so that the admin can respond to them.
