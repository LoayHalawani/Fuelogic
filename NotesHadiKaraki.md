The MVC (models-views-controllers) pattern will be used for this project
Doing seperate files for inserting creating and selecting is wrong and is not part of the project, except
if the admin wants to add data to the database directly as a starting point from MySQL's command line. But to make it dynamic where users can add data through the website directly the MVC model should be used where the model contains functions
like create, getUserByUsername/Id etc which get accessed on the website

it is better to remove many of the attributes in the ER diagram because it would take forever to put them all