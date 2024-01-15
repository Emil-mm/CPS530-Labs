#!/usr/bin/perl -wT
use CGI':standard';
use strict;
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
use File::Basename;
$CGI::POST_MAX = 1024 * 5000; 
print "Content-type: text/html\n\n";
# https://www2.scs.ryerson.ca/~emoc/cgi-bin/lab07b.cgi

# Profile Picture
# The safe characters for file naming
my $safe_filename_characters = "a-zA-Z0-9_.-";
my $upload_dir = "/home/emoc/public_html/lab07/upload";
my $query = new CGI; 
my $filename = $query->param("pic");

my $filemsg = "";
if ($filename eq "") { 
	$filemsg = "There was a problem uploading your photo (try a smaller file)."; 
}
else {
	# Makes the filename safe
	my ($name, $path, $extension) = fileparse ( $filename, '\..*' );
	$filename = $name . $extension;
	$filename =~ tr/ /_/; 
	$filename =~ s/[^$safe_filename_characters]//g;

	if ( $filename =~ /^([$safe_filename_characters]+)$/ ) { 
		$filename = $1; 
	} 
	else { 
		$filemsg = "Filename contains invalid characters"; 
	}
}

# If there are no warnings after checking the file, upload the file
if ($filemsg eq "") {
	my $upload_filehandle = $query->upload("pic");
	open (UPLOADFILE, ">$upload_dir/$filename") or die "$!"; 
	binmode UPLOADFILE; 
	while (<$upload_filehandle>) { 
		print UPLOADFILE; 
	} 
	close UPLOADFILE;
}

#Name Variables
my $fname = param ("fname");
my $lname = param ("lname");

#Check if any of the given strings are empty
my $name = "<p>";
if($fname eq "") {
	$name = $name."<span class='hlight'>[First Name]</span> "
}
else {
	$name = $name."$fname ";
}

if($lname eq "") {
	$name = $name."<span class='hlight'>[Last Name]</span></p>";
}
else {
	$name = $name."$lname</p>";
}

# Address Variables
my $street = param ("street");
my $city = param ("city");
my $postal = param ("pcode");
my $prov = param ("prov");

#Check if any of the given strings are empty
my $address = "<p>";
if ($street eq ""){
	$address = $address."<span class='hlight'>[Street]</span> ";
}
else {
	$address = $address."$street ";
}

if($city eq ""){
	$address = $address."<span class='hlight'>[City]</span>, ";

}
else {
	$address = $address."$city, ";

}

if($prov eq ""){
	$address = $address."<span class='hlight'>[Province]</span> ";
}
else {
	$address = $address."$prov ";

}

if ($postal eq "") {
	$address = $address."<span class='hlight'>[Postal Code]</span></p>";
}
else {
	#Check if matches 7 characters with the format M8M 8M8
	if ($postal =~ m/(^[a-zA-Z]\d[a-zA-Z] \d[a-zA-Z]\d$)/) {
		$address = $address."$postal</p>";
	}
	else {
		$address = $address."<span class='hlight'>$postal</span></p>";
	}
}

# Phone Number Variable
my $phonenum = param ("phoneNum");

#Check if phonenumber is empty and is 10 digits
my $phone ="<p>";
if ($phonenum eq ""){
	$phone = $phone."<span class='hlight'>[Phone Number]</span></p>";
}
else {
	if ($phonenum =~ m/(^\d{10}$)/){
		$phone = $phone."$phonenum</p>";
	}
	else{
		$phone = $phone."<span class='hlight'>$phonenum</span></p>";
	}
	
}

# Email Variable
my $emailadd = param ("email");

my $email = "<p>";
if ($emailadd eq "") {
	$email = $email."<span class='hlight'>[Email Address]</span></p>";
}
else {
	if ($emailadd =~ m/(.+)@([a-zA-Z]+)(\.)[a-zA-Z]{2,3}/) {
		$email = $email."$emailadd</p>";
	}
	else {
		$email = $email."<span class='hlight'>$emailadd</span></p>";
	}
}

print << "HTML CODE";
<!DOCTYPE HTML>
<html>
    <head>
		<title>Lab07b - Perl and CGI</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Archivo&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Archivo Black" rel='stylesheet'>
		<style>
			\@keyframes bg-gradient {
				0% {background-position: 0 50%;}
				50% {background-position:100% 50%;}
				100% {background-position: 0 50%;}
			}

			body {
				background: linear-gradient(-45deg,SlateBlue 20%, Purple);
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: 400% 400%;
				animation: bg-gradient 15s ease infinite;
			}

			.hlight {
				background-color: yellow;
			}

			#welcome {
				box-sizing: border-box;
				background-color: black;
				width: 75%;
				color: white;
				border-radius: 12px 12px 0px 0px;
				box-shadow: 5px 10px 3px 2px #999999;
				padding: 2% 4%;
				margin: 25px auto 0px;
				font-family: 'Archivo Black', sans-serif;
				font-size: calc(15px + 1vw);
			}

			#info-container {
				box-sizing: border-box;
				background-color: white;
				width: 75%;
				border-radius: 0px 0px 12px 12px;
				box-shadow: 5px 10px 3px 2px #999999;
				padding: 2% 4%;
				margin: 0px auto 35px;
				font-family: 'Roboto', sans-serif;
				font-weight: 700;
				font-size: calc(12px + 1vw);
			}

			#info-container img {
				width: 45%;
				height: auto;
			}
		</style>
    </head>
    <body style="text-align: center; align-content: center;">
		<div id="welcome">
			<h1>Welcome</h1>
		</div>
		<div id="info-container">
			$name<br>
			<p><img src="../lab07/upload/$filename" alt=" "><span class='hlight'>$filemsg</span></p><br>
			$address<br>
			$phone<br>
			$email
		</div>
    </body>
</html>
HTML CODE
