#!/usr/bin/ruby
puts "Content-type: text/html\n\n"

# https://www2.cs.torontomu.ca/~emoc/cgi-bin/lab10r.cgi 
require 'cgi'
cgi = CGI.new

city = cgi['city']
prov = cgi['prov']
country = cgi['country']
url = cgi['url']

puts "<html>"
puts "<head><title>Lab10r - Exploring More Development Options</title></head>"
puts "<body style='background-color: Lavender; margin: 0px;'>"

puts "<div style='text-align: center; color: RebeccaPurple; font-family: Verdana, sans-serif;'><h1>"+ city.capitalize + ", "+ prov.capitalize + ", "+ country.capitalize + "</h1>"
puts "<img src="+ url +" style='width:100%'></div>"

puts "</body>"
puts "</html>"