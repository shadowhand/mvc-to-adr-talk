# MVC

Originally seen in Smalltalk-76 and Smalltalk-80

First published as a concept in 1988 article Journal of Object Technology

Widely adopted on the web following Apple WebObjects in 1996

Moved to Java following porting of WebObjects to that language

Spring (Java) was released in 2002 and became popular

Mojavi (PHP) 1.0 was released in October 2003, likely the first open source example of MVC In PHP

PRADO (PHP) was started in January 2004

Rails (Ruby) was first released in July 2004

Django (Python) started in 2003, released publicly in July 2005

Agavi (PHP) was forked from Mojavi in May 2005

CakePHP (PHP) was announced in August 2005

Symfony (PHP) was announced in October 2005

Many frameworks followed:

- 2006: CodeIgniter, Zend Framework, SilverStripe
- 2007: Kohana
- 2009: Lithium
- 2010: PHP-FIG (not a framework)
- 2011: Laravel, FuelPHP, Silex, TYPO3
- 2012: Phalcon
- etc

# HMVC

Originally published in [July 2000 on JavaWorld][1]

Proposed a hierarchy of MVC triads to respond to a request

First adopted in PHP by Kohana in 2009

Later used by FuelPHP in 2010

[1]: http://www.javaworld.com/article/2076128/design-patterns/hmvc--the-layered-pattern-for-developing-strong-client-tiers.html

# MVP

Originated in early 1990s at Taligent in the CommonPoint C++ environment

Pushed presentation logic to a "presenter" and focused on testing and separation of concerns

Used for Dolphin Smalltalk in 1997

Documented by Microsoft in 2006 for .NET

First used in PHP by Nette Framework in 2006

## MVC vs MVP

In MVC, the controller creates the view and all actions are directed back the controller
In MVP, the view is created first and calls presenter actions that return changes

<http://stackoverflow.com/questions/2056/what-are-mvp-and-mvc-and-what-is-the-difference#101561>


# MVVM

Originally published in 2005 by John Gossman at Microsoft

Used for Windows Presentation Foundation (WPF) and Silverlight

Also called "model view binder"

Used by KnockoutJS (JS) and ZK (Java)

Not seen much in PHP, some experimental frameworks exist

## MVVM vs MVC

In MVVM, View and ViewModel have two way data bindings, ViewModel holds state and abstracts access to Model
In MVC, controller pulls data from the model and pushes it to the view, no data binding exists

MVVM was focused on allowing UX designers to write markup that binds to the ViewModel

Attempts to separate UI presentation and interaction from UI state and storage concerns

