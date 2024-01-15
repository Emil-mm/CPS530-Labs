#!/usr/bin/perl
use CGI' :standard';
use strict;
print "Content-type: text/html\n\n";

# https://www2.scs.ryerson.ca/~emoc/cgi-bin/lab07a.cgi
print << "HTML CODE";
<!DOCTYPE HTML>
<html>
    <head>
        <title>Lab 07a - Perl and CGI</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
    </head>
    <body>
        <p style="text-align: center; color: blue; font-family:'Space Mono'; font-size: 3em;">This is my first Perl program</p>
    </body>
</html>
HTML CODE