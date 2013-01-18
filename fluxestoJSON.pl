use strict;
use warnings;

open(WEIGHTS, "results.txt");
open(EDGES, "resultstoedges.txt");

my %fluxes;
while (<WEIGHTS>) {
	chomp $_;
	my @splitline = split(/\t/, $_);
	$fluxes{$splitline[0]} = $splitline[1];
}

my %edgeflux;
while (<EDGES>) {
	chomp $_;
	my @splitline = split(/\t/, $_);
	my $edgename = $splitline[0];
	my $fluxname = $splitline[1];
	if ($fluxes{$fluxname}) {
		$edgeflux{$edgename} = $fluxes{$fluxname};		
	}
	else {
		$edgeflux{$edgename} = 0;
	}
}

# output as a simple table
foreach (keys %edgeflux) {	
	print "$_\t$edgeflux{$_}\n";
}

open(JSON, ">jsonfluxes.js");
# output as JSON
print JSON "jsonfluxes = {\n";
foreach (keys %edgeflux) {
	print JSON "\t".'"'.$_.'" : '.$edgeflux{$_}.','."\n";
}
print JSON "}";