Link : https://github.com/asankasandakelum1/SIMS.git

Project Description : The "Seaport Immigration Management System" project is aimed at revolutionizing the seaport immigration operations in Sri Lanka.This project introduces an electronic system for seaport operations, focusing on enhancing information management for transit passengers and ship crews.

==============================================================
Description of project files:
This project has built based on MVC architecture. 
--------------------------------------------------------------
1.Application Folder:
The application folder serves as the main container for the core application logic and resources. It typically houses subfolders and files related to controllers, models, views, configuration settings, and other essential components of the web application.
1.1 controllers: Contains controller classes that handle incoming requests and process data.
1.2 models: Houses model classes that represent data objects and interact with the database.
1.3 views: Stores view templates used to render the user interface.
1.4 config: Contains configuration files for the application, such as database connection settings, environment variables, and other global parameters.
1.5 helpers: Contains helper functions that can be used throughout the application to provide common functionality.
1.6 hooks: Might contain hooks or callbacks that can be triggered at specific points in the application lifecycle.
1.7 language: Might store language files for localization and internationalization.
1.8 libraries: Contains third-party libraries or custom libraries that are used by the application.
1.9 logs: Stores log files that can be used for debugging and troubleshooting.
1.10 third_party: Might contain third-party libraries or dependencies that are not part of the core framework.

1.1 controllers: Contains controller files responsible for handling incoming requests and processing data.These controllers are responsible for handling incoming requests from users, processing data, and interacting with models and views to generate the appropriate response.
Admin.php: Likely handles administrative tasks or actions within the application.
Agent.php: Handles agent-related functionalities, such as managing agents or their activities.
Home.php: Controls the application's homepage or landing page.
Login.php: Handles the login process, user authentication, and login attempts.
Officer.php: Controls officer-related functions, such as managing officers or their duties.
Register.php: Handles user registration, the process of creating new user accounts.
Shipcaptain.php: Controls ship captain-related functionalities, such as managing ship captains or their activities.

1.2 models: Houses model files that represent data objects and interact with the database.These model classes are responsible for defining the structure and behavior of data entities within the application.
Model_clearance.php: Represents clearance-related data, such as managing clearance levels or permissions.
Model_crew.php: Represents crew members, their information, and their roles within the application.
Model_Officer.php: Represents officers, their data, and their functionalities.
Model_ship.php: Represents ships, their data, and their attributes.
Model_shipagent.php: Represents ship agents, their data, and their roles.
Model_shipcaptain.php: Represents ship captains, their data, and their responsibilities.
Model_user.php: Represents users, their data, and their account information.
Model_voyage.php: Represents voyages, their data, and their details.

1.3 views: Stores view templates used to render the user interface. These templates define the structure, layout, and content of the pages that users see when interacting with the application.
  1.3.1 Admin folder:
dashboard.php: Likely the main view template for the administrative dashboard, providing an overview of key metrics or functionalities.
dashboard_Home.php: A partial template used within the dashboard, displaying a home section or summary information.
Ship_AgentReg.php: View template for registering ship agents.
ship_AgentView.php: View template for viewing ship agent details or managing their information.
user_roles.php: View template for managing user roles and permissions.
  1.3.2 Agent folder:
approvedClearance.php: View template for displaying approved clearances or related information.
crew_Registration.php: View template for crew registration.
dashboard.php: Main view template for the agent's dashboard.
dashboard_Home.php: Partial template used within the dashboard.
RequestArrivalClearance.php: View template for requesting arrival clearance.
ship_Registration.php: View template for ship registration.
voyage_Registration.php: View template for voyage registration.
  1.3.3 Officer folder:
assigncaptain.php: View template for assigning a captain to a ship or voyage.
crewview.php: View template for viewing crew details or managing their information.
dashboard.php: Main view template for the officer's dashboard.
dashboard_Home.php: Partial template used within the dashboard.
issueArrivalClearance.php: View template for issuing arrival clearance.
issueShorePass.php: View template for issuing shore passes to crew members.
searchCrew.php: View template for searching for crew members based on specific criteria.
  1.3.4 Shipcaptain folder:
approved_shorepass.php: View template for displaying approved shore passes or related information.
assignship.php: View template for assigning a ship to a ship captain.
dashboard.php: Main view template for the ship captain's dashboard.
dashboard_Home.php: Partial template used within the dashboard.
request_shorepass.php: View template for requesting a shore pass.

2. Assets Folder: Contains static assets such as images, CSS stylesheets, JavaScript files, and other resources that are served directly to the client.

Other Files:
.htaccess: Configures Apache web server settings.
index.html: The default HTML file served by the web server.

