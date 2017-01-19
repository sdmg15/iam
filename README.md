__IamBot__ Version dof_init.1
----------

[![Build Status](https://travis-ci.org/sdmg15/iam.svg?branch=master)](https://travis-ci.org/sdmg15/iam)

Authored by *sdmg15*

*Intentions*
------------
This command helps new members or former members of a slack team to present themselves to others. I designed this command because in my team I saw that there was too much recurrence. It means that when a new user was coming, those who are connected that day rushed to ask the new member his jobs, which techs does he use.... And maybe morrow or later others members which were not connected that day  are today connected, what they will do is to try getting information about new users during their absent. They will ping the new user and ask him information that he has already given and maybe he will be fed up. This will become too hard to know who is who! So I created this command to remedy this problem.

*Usage*
---------
The usage of the command is very straightforward.
First, you have to fork or clone the source code and then you can deploy it either on Heroku or on Openshift.
After deploying visit [this link](https://api.slack.com/custom-integrations) and then click on ``New /command `` located on the right menu.
In the field to choose the name of the command, write down ``/iam`` and click on the button. After chose the name, you will be redirected to another page, On that page look for the input field named ``URL`` and fill it with the url you received when you deploy the app on Heroku or Openshift. Always on the same page, look for the input field named ``Token`` and copy the token of your team contained on that input and then go in the file ``index.php`` on line ``13`` and replace the ``TOKEN_OF_YOUR_TEAM`` by the copied token.
If you have done all these steps, now you can check for the list of available options for the command.
Here is the list of available options for the command :

- ``/iam``  without any option, this will display the guides line of the command in order to present the usage of the command.
- ``/iam show [username] `` with the option ``show`` followed by the name of the user whose you want to see the introduction.
- ``/iam create [my_intro] `` Well you are new ? Creating  new introduction is very simple. You just have to seize ``/iam`` with the option ``create`` and follow this by the introduction text and then press ``Enter`` when you finished.
- ``/iam edit [new_intro] `` Maybe while creating your introduction you made mistakes ? Ok, no problems this is the command you need. This includes the option ``edit`` directly followed by the new presentation text.

*Resource*
----------

Slack API documentation. To view visit https://www.api.slack.com/slash-commands.


*Enjoy it!*
-----------
