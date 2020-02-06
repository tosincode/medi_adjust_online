=== Ultimate Appointment Booking & Scheduling ===
Contributors: Rustaurius, EtoileWebDesign
Tags: booking calendar, appointment, appointments, appointment booking, appointment scheduling, booking, meeting booking, reservation, calendar, consultation, dates, session, quote, woocommerce appointments, scheduling, woocommerce services
Requires at least: 3.9
Tested up to: 5.0
License: GPLv3
License URI:http://www.gnu.org/licenses/gpl-3.0.html

Appointment booking calendar and scheduling plugin that lets you set up different services, service providers, locations and availability

== Description == 

Appointment booking platform that lets your customers schedule appointments directly on your website with an easy-to-use calendar and booking form. Set up locations, services, and providers for those services, and let your clients start booking their appointment reservations online today! 

<strong>Tested with WordPress 5.0!</strong>

<strong>New Gutenberg block included for displaying appointment booking forms!</strong>

= Key Appointment Booking Features =

* Create appointment locations with different opening hours
* Accept mandatory or optional payments before booking appointments via PayPal
* Create appointment services that cost different amounts and take different amounts of time
* Dynamically updated booking calendar and appointment schedules, so that it's impossible to double book
* Labelling and styling options to make your appointment scheduler and booking calendar fit perfectly with your business and website

Great for businesses that need to set up one-on-one or one-to-many services, such as mechanics, medical professionals, event venues, exercise classes, corporate training sessions, etc. Also works to schedule meetings, for scheduling phone calls and for other situations in which a booking form and reservation system are required.

`
[ultimate-appointment-calendar]
[ultimate-appointment-dropdown]
`

Simply insert either of the appointment booking shortcodes above into any page to display a responsive booking form. The first will display a booking calendar, from which you can select and reserve an appointment time. The second will allow you choose a date and then display available appointment booking times that are available for you to book a reservation.

Allow your visitors and customers to book reservations for a wide array of services and appointment types. With options to create an unlimited amount of unique appointment services, to speficy multiple different appointment locations, and to create service providers and specify the services they do, the booking locations they work at and their hours, all with an easy-to-use reservation form on the front end, Ultimate Appointment Scheduling provides the most simple and effecting booking solution and reservation system that is perfect for both you the admin as well as your site visitors.


= Additional Appointment Reservation Features =

Ultimate Appointment Scheduling comes with many more features that make it the most advanced and versatile booking form solution for accepting reservations on your WordPress site, including options to make your appointment services, locations and providers as specific or broad as you require, and a mobile booking form for the ultimate responsive reservation system.

* Options to set a minimum and maximum number of days before an appointment that a reservation for a service can be booked
* Set the amount of time between appointments. This, combined with the duration set for a service, will decide when appointment reservations can made.
* Send automatic emails to clients, the site admin and/or the service provider when a reservation is placed and an appointment is successfully created
* Set up automated reminder emails that will go out to your clients a certain number of days or hours before their appointments
* Require appointment confirmation
* Require login to WordPress, Front-End Only Users, Facebook or Twitter before being a to create an appointment, to prevent spam

= Shortcodes =

* [ultimate-appointment-calendar]: display a calendar that with available appointment times that users can click to select an appointment
* [ultimate-appointment-dropdown]: display a set of dropdown menus to find appointment times and schedule an appointment

= Translations =

* German (Thanks to <a href='http://wordpress.org/support/profile/bkleine'>bkleine</a>)


Plugin is still in beta, so please report any bugs you might find in the support forum! Big update coming in March!



--------------------------------------------------------------

== Frequently Asked Questions ==

= How do I get an appointment scheduler to show up on my page? =

Try adding the shortcode [ultimate-appointment-dropdown] to whatever page you'd like to display it on. 

= What are the current UASP shortcodes? =

* [ultimate-appointment-dropdown]: display a set of dropdown menus to find appointment times and schedule an appointment
* [ultimate-appointment-calendar]: display a calendar-based booking form

= How do I add custom CSS? =
In the plugin admin, please do the following:

* Click on Options and then choose the Basic area
* Write down your CSS code in the Custom CSS text area
* Click "Save Changes" to save your changes

= How do I add new fields to the booking form? =

To create custom fields, you need to go to the Custom Fields tab and simply add a new field. Do not forgot to set their options (slug, type and input values) properly in order to prevent confusion.

= Can I redirect to another page after the booking form is submitted? = 

You can do this in the shortcode. For example: [ultimate-appointment-dropdown redirect_page="http://google.com/"]

= Can I limit booking to a certain number of days before the appointment = 

To do this, you can use the "Minimum Days in Advance" and "Maximum Days in Advance" settings in the "Basic" area of the "Options" tab.

= Can I send email reminders to people about their appointments? =

You definitely can. First go to the "Emails" area of the "Options" tab and create your email. Then go to the "Reminders" area of the "Options" tab, create your reminder and choose the email you want to be sent out for the reminder.


== Screenshots ==

1. Sample appointment scheduling start page
2. Sample appointment scheduling appointment selected
3. The "Locations" admin tab
4. The "Services" admin tab
5. The "Service Providers" admin tab
6. The "Options" admin tab

== Changelog ==
= 1.1.1 =
- Corrected issue with Gutenberg block not displaying in new WordPress 5.0

= 1.1.0 =
- <strong>This is a big update with many new features, corrections, revised admin styling, etc., so please take caution and test before updating on a live site (or wait a few days before updating in case some minor corrective updates need to be put out)</strong>
- Added in easy-to-use Gutenberg block for the appointment booking form
- The options pages have a brand new and easy-to-use design!
- Completely redesigned appointment create/edit screen. More intuitive, allowing you to more quickly and efficiently create and edit appointments.
- Added in an option for multi-step booking
- Added in the ability to export appointments
- Added in the ability to import appointments
- Added in new labelling options
- Added in a new calendar view to the Appointments (overview) tab in the plugin admin
- Cleaned up the layout of the Appointments tab
- Added in an option to specify the PHP date format used when the date is included (e.g. in emails)
- Added in an option to display custom fields (as a new column) in the table in the Appointments tab
- Added in an option to specify the admin email address
- Added in the ability for customers to cancel an appointment/booking from the email
- Added a tag to put the admin appointment link in the email notifications the admin receives
- All font size options now automatically apply a unit of 'px' if you do not specify a unit
- Switched from using PHPExcel to the new PHPSpreadsheet for importing and exporting
- Corrected a few issues with the jQuery UI datepicker, including some styling elements
- Corrected issue in which the incorrect time was showing in the booking calendar when the timezone in the plugin was changed and/or different from the timezone in the WordPress Settings > General 
- Corrected issue in which 24-hour times weren't showing in the calendar
- Corrected issue in which the number of items count was incorrect in the Appointments tab in the admin 
- Minor styling updates to front-end forms
- Added version numbers to enqueued files
- Generated new .pot file


= 1.0.6 =
- Corrected issue that was causing warnings about email reminders when an appointment was created

= 1.0.5 =
- Added in the ability to put custom field values into reminder emails that were typed in the "Emails" tab
- Fixed an issue where the "Hour Format" option wouldn't apply to the time selector in calendar mode
- Fixed an issue where reminder emails would send repeatedly if an appointment was booked within the reminder timeframe

= 1.0.4 =
- Fixed an issue where the calendar mode wasn't taking the appointment length into consideration when displaying available slots for next appointments

= 1.0.3 =
- Fixed an error that would come up when reminder emails were being sent out

= 1.0.2 =
- Fixed a couple of console errors

= 1.0.1 =
- Styling updates
- Corrected issue with premium upgrade process

= 1.0.0 =
- Premium version release
- New admin dashboard and updated admin styling
- Added in new labelling options
- Fixed issue with the options for setting the minimum and maximum number of days from the appointment date that it can be booked
- Fixed issue with exceptions not correctly being applied
- Fixed "cart empty" issue when paying for appointment via PayPal

= 0.30 =
- Added in a option to change to 12h or 24h time format instead of the default 
- Added in the WooCommerce order number when an appointment is booked through WooCommerce appointment booking
- Fixed an error where custom fields couldn't be deleted

= 0.29 =
- This is a big update with quite a few corrections/additions, so please use caution when updating if using this on a live site
- Added half-hour options for location open/close times and provider start/finish times
- Added option to choose the language for the calendar appointment format
- Added redirect_page attribute to the ultimate-appointment-calendar shortcode
- Added ability to filter the "Appointments" tab in the admin by location, service and/or provider
- Added appointment statistics to the "Dashboard" tab
- Added option to choose an offset for the default/starting calendar date
- Added ability to select number of appointments that show per page in the admin
- Corrected issue that was causing appointment blocks to still show in the calendar even if the duration of the appointment went beyond a provider's finish time for that day
- Corrected issue that was sometimes showing HTML in subject line of automatic emails
- Corrected issue that was making the appointment picking calendar not appear sometimes when manually creating an appointment in the back end

= 0.28 =
- Added in custom fields, which lets you know add additional fields to your booking form
- Added in a new booking form style
- Corrected an issue that was causing a booking time offset when using the calendar format
- Set a default timezone, to correct the issue with the blank screen on plugin activation

= 0.27 =
- Minor styling updates

= 0.26 =
- For sites where payment is set to "Required", appointments that aren't paid within the next 20 minutes will be automatically deleted
- Fixed an error where PayPal payments weren't working on some sites

= 0.25 =
- Fixed an error where some styling options weren't saving or weren't being applied

= 0.24 =
- Added nonces to a few forms that were missing them
- Fixed a number of deleting/saving errors

= 0.23 =
- Added in option to set the default location, service, service provider and date via URL parameters
- Added in 2 new labelling options

= 0.22 =
- Added in an optional captcha field to the tracking form

= 0.21 =
- HUGE update, so please be careful updating if you use the plugin on a live site
- Added in a new shortcode, 'ultimate-appointment-calendar', which displays a calendar with free appointment times that visitors can select by clicking
- Added in WooCommerce integration as a payment option, where users will be taken to the WC checkout page to pay after selecting their appointment
- Added in an 'Emails' tab on the 'Settings' page, where you can now customize all of the emails sent out by the plugin (when appointments are booked, for admins, appointment reminders)
- Improved the look of the email sent out, allowing the use of section breaks, appointment information and buttons with links attached to them
- Fixed a number of small bugs

= 0.20 =
- Fixed an error with client and service provider emails not being sent out
- Fixed a typo on the options page

= 0.19 =
- Updated the text domain of the plugin, to use the improved WordPress standard

= 0.18 =
- Fixed an error where exceptions couldn't be created

= 0.17 =
- Fixed an error where some new appointments weren't being saved

= 0.16 =
- Added in an appointment's details to the reminder emails

= 0.15 =
- Added in an "edit-appointment" shortcode
- Added options to specify the minimum and maximum numbers of days in advance an appointment can be scheduled
- You can now click anywhere in the appointment date box to bring up the date selector
- Clarified the "Service Provider" hour field instructions in the back-end
- Added an attribute, redirect_page, to specify a page to redirect visitors to after they successfully book an appointment

= 0.14 =
- Replaced "Client" with the client's name in client notification emails
- Fixed an error where appointments with no scheduled time could still be created in the back-end

= 0.13 =
- Added an option to require certain information on the sign up form
- Appointment sign up form can no longer be submitted without a time being selected
- Added an option to specify how far apart the appointments should be (in minutes) on the sign up form
- Fixed an error where the "Set Access Role" option was disabled

= 0.12 =
- Added an option to send an appointment email to a client on sign up
- Added an option to send a notification email to the service provider on sign up
- Added an option to set what user role should have access to the "Appointments" menu

= 0.11 =
- Fixed a problem where service providers would show up for locations where they weren't working

= 0.10 =
- Fixed a couple of errors, including one where service providers weren't updated based on the service selected

= 0.9 =
- Added in an option, "Login Required", that forces visitors to log in through one of the selected services before being able to schedule an appointment
- Added in the login options necessary for the "Login Required" option to work smoothly
- Fixed an error where service providers couldn't be edited after they were created

= 0.8 =
- Fixed a bug where the "Services" dropdown wasn't activiated until there was more than 1 location

= 0.7 =
- Some small CSS changes

= 0.6 =
- Big overhaul of the CSS to display the appointment scheduler, so that there's no text overlap any more
- Added in a number of labelling and styling options, to make it easier to customize the plugin

= 0.5 =
- Fixed a couple of UI elements in the back-end, to make it easier to create appointments from the admin interface

= 0.4 =
- Small visual fixes, let us know in the support forum if there are other features you'd like to see or if there are features that aren't working for you!

= 0.3 =
- Added a tonne of new features and fixed many little errors including:
- PayPal integration so that appointments can be paid for online
- Email reminders and appointment confirmation
- Fixed bugs with creating exceptions, editing appointments and more

= 0.2 =
- Big styling update so that the dropdowns look much more acceptable

= 0.1 =
- Initial beta version. Please make comments/suggestions in the "Support" forum.

== Upgrade Notice ==

