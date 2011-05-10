# Nova RPG Management System

Anodyne Production's next-generation RPG management system combines popular features from the SIMM Management System as well as new features like internationalization, developer enhancements, commenting on entries, dynamic forms, multiple characters per player and much more to make Nova the premier web-based solution for managing your RPG game.

## Current Version

2.0-beta

## Changes in 2.0

* added the message.php file to handle notification of bans, a missing "nova" directory and incompatible PHP version
* added new process to write the database config file for you
* added the ability to upgrade SMS Database entries to Thresher wiki pages
* added the ability for textareas to "grow" as more text is added like Facebook
* updated seamless substitution to be able to override email view files
* updated Thresher with a new way to create and manage categories when working on a wiki page
* updated Thresher with a completely new user experience for managing wiki pages
* updated Thresher with a brand new interface for viewing wiki pages
* updated the upload instructions to include the maximum file size and maximum image dimensions from the config file for reference
* updated to jquery version 1.6
* updated to jquery version 1.8.12
* updated to uniform version 1.7.5
* updated to prettyPhoto version 3.1.2
* updated to qTip2
* refactored the location helper into a full-blown class with static methods
* refactored the upgrade process to mirror what was created for nova 3
* removed the banned.php file
* removed the rss model since it isn't necessary any more
* fixed bug with seamless substitution of images where they wouldn't work when they were in the _base_override directory
* fixed bug with private messages where RE: and FWD: would constantly be added to message, now Nova will make sure it's only added once
* fixed bug with private messages where the person sending the message would be on the recipient list, so any message they sent would show up in their inbox as well
* fixed bug where the join form could be submitted without an email address or password

## Version History

<table>
	<tr>
		<th>Version</th><th>Release Date</th>
	</tr>
	<tr>
		<td>2.0</td><td>24 June 2011</td>
	</tr>
	<tr>
		<td>1.2.4</td><td>25 January 2011</td>
	</tr>
	<tr>
		<td>1.2.3</td><td>04 January 2011</td>
	</tr>
	<tr>
		<td>1.2.2</td><td>30 December 2010</td>
	</tr>
	<tr>
		<td>1.2.1</td><td>23 December 2010</td>
	</tr>
	<tr>
		<td>1.2</td><td>20 December 2010</td>
	</tr>
	<tr>
		<td>1.1.2</td><td>14 October 2010</td>
	</tr>
	<tr>
		<td>1.1.1</td><td>27 September 2010</td>
	</tr>
	<tr>
		<td>1.1</td><td>4 September 2010</td>
	</tr>
	<tr>
		<td>1.0.6</td><td>14 July 2010</td>
	</tr>
	<tr>
		<td>1.0.5</td><td>06 June 2010</td>
	</tr>
	<tr>
		<td>1.0.4</td><td>12 May 2010</td>
	</tr>
	<tr>
		<td>1.0.3</td><td>26 April 2010</td>
	</tr>
	<tr>
		<td>1.0.2</td><td>20 April 2010</td>
	</tr>
	<tr>
		<td>1.0.1</td><td>16 April 2010</td>
	</tr>
	<tr>
		<td>1.0</td><td>15 April 2010</td>
	</tr>
</table>