#!/usr/bin/python
print "Content-type:text/html\n\n"

# https://www2.cs.torontomu.ca/~emoc/cgi-bin/lab10p.cgi

import cgi, cgitb 
form = cgi.FieldStorage() 

city = form.getvalue('city')
prov = form.getvalue('prov')
country = form.getvalue('country')
url = form.getvalue('url')

print "<html>"
print "<head><title>Lab10p - Exploring More Development Options</title></head>"
print "<body style='background-color: Lavender;'>"

print "<div style='text-align: center; color: RebeccaPurple; font-family: Verdana, sans-serif;'><h1>%s, %s, %s</h1>" % (city.upper(), prov.upper(), country.upper())
print "<img src=",url," style='width:80%; border: 5px solid RebeccaPurple;'></div>"

print "</body>"
print "</html>"