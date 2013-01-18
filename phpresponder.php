<?php
createModelFile();
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    // server using Windows!
	exec("sfba.exe -i pf_iTF42_SFBA -o MalariaBiomass_s -p fba -s simplex -X _b -f results.txt");
} else {
    // server not using Windows!
	exec("./sfba -i pf_iTF42_SFBA -o MalariaBiomass_s -p fba -s simplex -X _b -f results.txt");
}
exec("perl fluxestoJSON.pl");
readfile("jsonfluxes.js");

function createModelFile() {
	$file = "pf_iTF42_SFBA";
	$fh = fopen($file, 'w');
	fwrite($fh,
'ADG_btoc_s	C00267_b = C00267_c	0	' . $_GET['glucose']/2 . '	unknown
ADP_atoc_s	C00008_a = C00008_c	-500	500	unknown
ADP_mtoc_s	C00008_m = C00008_c	-500	500	unknown
ATP_atoc_s	C00002_a = C00002_c	-500	500	unknown
ATP_mtoc_s	C00002_m = C00002_c	-500	500	unknown
ATPmaint_c	C00001_c + C00002_c = C00008_c + C00009_c	' . $_GET['atp'] . '	' . $_GET['atp'] . '	unknown
Adenine_btoc_s	C00147_b = C00147_c	0	0	unknown
Adenosine_btoc_s	C00212_b = C00212_c	0	0	unknown
BDG_btoc_s	C00221_b = C00221_c	0	' . $_GET['glucose']/2 . '	unknown
CO2_atoc_s	C00011_a = C00011_c	-500	500	unknown
CO2_btoc_s	C00011_b = C00011_c	-500	500	unknown
CO2_mtoc_s	C00011_m = C00011_c	-500	500	unknown
FADH2_mtoc_s	C01352_m = C01352_c	-500	500	unknown
FAD_mtoc_s	C00016_m = C00016_c	-500	500	unknown
Fumarate_btoc_s	C00122_b = C00122_c	-500	0	unknown
GDP_mtoc_s	C00035_m = C00035_c	-500	500	unknown
GSSG_btoc_s	C00127_b = C00127_c	-0.18	-0.09	unknown
GTP_mtoc_s	C00044_m = C00044_c	-500	500	unknown
GenAcetylation_m	C00024_m = AcCmpd_m + C00010_m	-500	500	unknown
Glutamine_btoc_s	C00064_b = C00064_c	0	' . $_GET['glutamine'] . '	unknown
Glycerol_btoc_s	C00116_b = C00116_c	' . $_GET['glycerol'] . '	' . $_GET['glycerol'] . '	unknown
H2O2_vtoc_s	C00027_v = C00027_c	0	500	unknown
H2O_atoc_s	C00001_a = C00001_c	-500	500	unknown
H2O_btoc_s	C00001_b = C00001_c	-500	500	unknown
H2O_mtoc_s	C00001_m = C00001_c	-500	500	unknown
H2O_vtoc_s	C00001_v = C00001_c	-500	500	unknown
HCO3_atoc_s	C00288_a = C00288_c	-500	500	unknown
HCO3_btoc_s	C00288_b = C00288_c	-500	500	unknown
H_atoc_s	C00080_a = C00080_c	-500	500	unknown
H_btoc_s	C00080_b = C00080_c	-500	500	unknown
H_mtoc_s	C00080_m = C00080_c	-500	500	unknown
HemetoHz_s	' . $_GET['haemoglobin'] . ' C00001_c + ' . $_GET['haemoglobin'] . ' C00002_c + C00032_v = ' . $_GET['haemoglobin'] . ' C00008_c + ' . $_GET['haemoglobin'] . ' C00009_c + Hemozoin_v	-500	500	unknown
Hemoglobin_btov_s	C01708_b = C01708_v	-500	500	unknown
Hemozoin_btov_s	Hemozoin_b = Hemozoin_v	-500	500	unknown
Hydrogen_vtoc_s	C00080_v = C00080_c	-500	500	unknown
Hypoxanthine_btoc_s	C00262_b = C00262_c	0	500	unknown
Leucine_btoc_s	C00123_b = C00123_c	-500	500	unknown
Lmal_btoc_s	C00149_b = C00149_c	' . $_GET['malate'] . '	0	unknown
Lmal_mtoc_s	C00149_m = C00149_c	-500	500	unknown
MalariaBiomass_s	' . 0.594995166*$_GET['fat']. ' AcCmpd_m + ' . 4.13*$_GET['protein']. ' C00002_c + ' . 0.288885715*$_GET['protein']. ' C00025_c + ' . 0.127935102*$_GET['protein']. ' C00037_c + ' . 0.099046531*$_GET['protein']. ' C00041_c + ' . 8.18*$_GET['protein']. ' C00044_c + ' . 0.4787249*$_GET['protein']. ' C00047_c + ' . 0.247616327*$_GET['protein']. ' C00049_c + ' . 0.119681225*$_GET['protein']. ' C00062_c + ' . 0.013404853*$_GET['rna']. ' C00063_c + ' . 0.115554286*$_GET['protein']. ' C00064_c + ' . 0.259997144*$_GET['protein']. ' C00065_c + ' . 0.090792653*$_GET['protein']. ' C00073_c + ' . 0.045908655*$_GET['rna']. ' C00075_c + ' . 0.020634694*$_GET['protein']. ' C00078_c + ' . 0.189839184*$_GET['protein']. ' C00079_c + ' . 0.226981633*$_GET['protein']. ' C00082_c + ' . 1.262163677*$_GET['carb']. ' C00096_c + ' . 0.074284898*$_GET['protein']. ' C00097_c + ' . 0.334282042*$_GET['protein']. ' C00123_c + ' . 0.055469652*$_GET['dna']. ' C00131_c + ' . 0.090792653*$_GET['protein']. ' C00135_c + ' . 0.090792653*$_GET['protein']. ' C00148_c + ' . 0.503486532*$_GET['protein']. ' C00152_c + ' . 0.16920449*$_GET['protein']. ' C00183_c + ' . 0.173331429*$_GET['protein']. ' C00188_c + ' . 0.013351256*$_GET['dna']. ' C00286_c + ' . 0.155997758*$_GET['carb']. ' C00325_c + ' . 0.383805307*$_GET['protein']. ' C00407_c + ' . 0.013351256*$_GET['dna']. ' C00458_c + ' . 0.055469652*$_GET['dna']. ' C00459_c + ' . 0.06369691*$_GET['fat']. ' DesatFA_c + ' . 0.003785146*$_GET['fat']. ' FAC2H4unit_a = ' . 8.17*$_GET['protein']. ' C00009_c + ' . 4.34*$_GET['protein']. ' C00013_c + ' . 4.09*$_GET['protein']. ' C00020_c + ' . 9.59*$_GET['protein']. ' C00035_c + ' . 0.06369691*$_GET['fat']. ' C00162_c	0	50	unknown
NADH_atoc_s	C00004_a = C00004_c	-500	500	unknown
NADH_mtoc_s	C00004_m = C00004_c	-500	500	unknown
NADPH_atoc_s	C00005_a = C00005_c	-500	500	unknown
NADPH_mtoc_s	C00005_m = C00005_c	-500	500	unknown
NADP_atoc_s	C00006_a = C00006_c	-500	500	unknown
NADP_mtoc_s	C00006_m = C00006_c	-500	500	unknown
NAD_atoc_s	C00003_a = C00003_c	-500	500	unknown
NAD_mtoc_s	C00003_m = C00003_c	-500	500	unknown
NH3_btoc_s	C00014_b = C00014_c	-500	0	unknown
O2_btoc_s	C00007_b = C00007_c	-500	500	unknown
OG_ctom_s	C00026_c = C00026_m	-500	500	unknown
OHGbDigV_v	C05781_v = 24.0 C00025_v + 4.0 C00032_v + 40.0 C00037_v + 72.0 C00041_v + 44.0 C00047_v + 30.0 C00049_v + 12.0 C00062_v + 8.0 C00064_v + 32.0 C00065_v + 10.0 C00073_v + 6.0 C00078_v + 30.0 C00079_v + 12.0 C00082_v + 6.0 C00097_v + 72.0 C00123_v + 38.0 C00135_v + 28.0 C00148_v + 20.0 C00152_v + 62.0 C00183_v + 32.0 C00188_v + 4.0 C00704_v	0	500	unknown
Oxygen_vtoc_s	C00007_v = C00007_c	-500	500	unknown
PEP_ctoa_s	C00074_c = C00074_a	-500	500	unknown
PPi_btoc_s	C00013_b = C00013_c	-500	500	unknown
P_btoc_s	C00009_b = C00009_c	-500	500	unknown
Pi_atoc_s	C00009_a = C00009_c	-500	500	unknown
Pi_mtoc_s	C00009_m = C00009_c	-500	500	unknown
R00004_c	C00001_c + C00013_c = 2.0 C00009_c	0	500	3.6.1.1
R00009_v	2.0 C00027_v = 2.0 C00001_v + C00007_v	0	500	1.11.1.6
R00014_a	C00022_a + C00068_a = C00011_a + C05125_a	-500	500	1.2.4.1
R00086_c	C00001_c + C00002_c = C00008_c + C00009_c	0	500	3.6.3.1
R00087_c	C00001_c + C00002_c = C00013_c + C00020_c	0	500	3.6.1.8
R00089_c	C00002_c = C00013_c + C00575_c	-500	500	4.6.1.1
R00093_c	C00003_c + 2.0 C00025_c = C00004_c + C00026_c + C00064_c + C00080_c	-500	500	1.4.1.14
R00094_c	C00003_c + 2.0 C00051_c = C00004_c + C00080_c + C00127_c	-500	0	1.8.1.7
R00100_c	C00004_c + 2.0 C00996_c = C00003_c + C00080_c + 2.0 C00999_c	0	500	1.6.2.2
R00112_c	C00003_c + C00005_c = C00004_c + C00006_c	-500	500	1.6.1.1
R00115_c	C00006_c + 2.0 C00051_c = C00005_c + C00080_c + C00127_c	-500	0	1.8.1.7
R00122_c	C00001_c + C00008_c = C00009_c + C00020_c	0	500	3.6.1.5
R00124_c	0.0 C00002_c + 0.0 C00008_c = 0.0 C00002_c + 0.0 C00008_c	-500	500	2.7.4.6
R00127_c	C00002_c + C00020_c = 2.0 C00008_c	-500	500	2.7.4.3
R00132_c	C00001_c + C00011_c = C01353_c	-500	500	4.2.1.1
R00149_c	C00001_c + 2.0 C00002_c + C00011_c + C00014_c = 2.0 C00008_c + C00009_c + C00169_c	0	500	6.3.4.16
R00156_c	C00002_c + C00015_c = C00008_c + C00075_c	-500	500	2.7.4.6
R00158_c	C00002_c + C00105_c = C00008_c + C00015_c	-500	500	2.7.4.14
R00181_c	C00001_c + C00020_c = C00014_c + C00130_c	-500	500	3.5.4.6
R00191_c	C00001_c + C00575_c = C00020_c	0	500	3.1.4.17
R00200_a	C00008_a + C00074_a = C00002_a + C00022_a	-500	500	2.7.1.40
R00200_c	C00008_c + C00074_c = C00002_c + C00022_c	-500	500	2.7.1.40
R00243_c	C00001_c + C00003_c + C00025_c = C00004_c + C00014_c + C00026_c + C00080_c	-500	500	1.4.1.2
R00253_c	C00002_c + C00014_c + C00025_c = C00008_c + C00009_c + C00064_c	0	500	6.3.1.2
R00256_c	C00001_c + C00064_c = C00014_c + C00025_c	0	0	3.5.1.2
R00267_m	C00006_m + C00311_m = C00005_m + C00011_m + C00026_m + C00080_m	-500	500	1.1.1.42
R00274_c	C00027_c + 2.0 C00051_c = 2.0 C00001_c + C00127_c	-500	500	1.11.1.9
R00275_v	2.0 C00080_v + 2.0 C00704_v = C00007_v + C00027_v	-500	500	1.15.1.1
R00330_c	C00002_c + C00035_c = C00008_c + C00044_c	-500	500	2.7.4.6
R00332_c	C00002_c + C00144_c = C00008_c + C00035_c	-500	500	2.7.4.8
R00341_c	C00002_c + C00036_c = C00008_c + C00011_c + C00074_c	0	500	4.1.1.49
R00342_c	C00004_c + C00036_c + C00080_c = C00003_c + C00149_c	-500	500	1.1.1.37
R00342_m	C00004_m + C00036_m + C00080_m = C00003_m + C00149_m	-500	500	1.1.1.37
R00345_c	C00009_c + C00036_c = C00001_c + C00011_c + C00074_c	-500	500	4.1.1.31
R00351_m	C00010_m + C00158_m = C00001_m + C00024_m + C00036_m	-500	500	2.3.3.1
R00355_c	C00026_c + C00049_c = C00025_c + C00036_c	-500	500	2.6.1.1
R00405_m	C00008_m + C00009_m + C00091_m = C00002_m + C00010_m + C00042_m	-500	500	6.2.1.5
R00408_m	C00016_m + C00042_m = C00122_m + C01352_m	-500	500	1.3.99.1
R00432_m	C00009_m + C00035_m + C00091_m = C00010_m + C00042_m + C00044_m	0	0	6.2.1.4
R00434_c	C00044_c = C00013_c + C00942_c	-500	500	4.6.1.2
R00462_c	C00047_c = C00011_c + C01672_c	-500	500	4.1.1.18
R00497_c	C00002_c + C00037_c + C00669_c = C00008_c + C00009_c + C00051_c	0	500	6.3.2.3
R00551_c	C00001_c + C00062_c = C00077_c + C00086_c	-500	500	3.5.3.1
R00570_c	C00002_c + C00112_c = C00008_c + C00063_c	-500	500	2.7.4.6
R00573_c	C00001_c + C00002_c + C00064_c + C00075_c = C00008_c + C00009_c + C00025_c + C00063_c	-500	500	6.3.4.2
R00575_balanced_c	C00001_c + 2.0 C00002_c + C00064_c + C00080_c + C00288_c = 2.0 C00008_c + C00009_c + C00025_c + C00169_c	0	500	6.3.5.5
R00578_c	C00001_c + C00002_c + C00049_c + C00064_c = C00013_c + C00020_c + C00025_c + C00152_c	0	500	6.3.5.4
R00621_m	C00026_m + C00068_m = C00011_m + C05381_m	-500	500	1.2.4.2
R00658_c	C00631_c = C00001_c + C00074_c	-500	500	4.2.1.11
R00667_c	C00026_c + C00077_c = C00025_c + C01165_c	-500	500	2.6.1.13
R00703_c	C00004_c + C00022_c + C00080_c = C00003_c + C00186_c	-500	500	1.1.1.27
R00715_c	C00004_c + C00026_c + C00047_c + C00080_c = C00001_c + C00003_c + C00449_c	-500	500	1.5.1.7
R00742_balanced_a	C00002_a + C00024_a + C00080_a + C00288_a = C00008_a + C00009_a + C00083_a	0	500	6.4.1.2
R00842_c	C00004_c + C00080_c + C00111_c = C00003_c + C00093_c	-500	500	1.1.1.8
R00847_c	C00002_c + C00116_c = C00008_c + C00093_c	-500	500	2.7.1.30
R00848_c	C00111_c + C01352_c = C00016_c + C00093_c	-500	500	1.1.5.3
R00885_c	C00044_c + C00636_c = C00013_c + C00096_c	-500	500	2.7.7.13
R00888_c	C00096_c = C00001_c + C01222_c	-500	500	4.2.1.47
R00894_c	C00002_c + C00025_c + C00097_c = C00008_c + C00009_c + C00669_c	-500	500	6.3.2.2
R00939_c	C00006_c + C00101_c = C00005_c + C00080_c + C00415_c	-500	500	1.5.1.3
R00945_c	C00001_c + C00037_c + C00143_c = C00065_c + C00101_c	-500	500	2.1.2.1
R00965_c	C01103_c = C00011_c + C00105_c	-500	500	4.1.1.23
R01015_c	C00118_c = C00111_c	-500	500	5.3.1.1
R01016_c	C00111_c = C00009_c + C00546_c	-500	500	4.2.3.3
R01036_c	C00003_c + C00116_c = C00004_c + C00080_c + C00577_c	-500	500	1.1.1.21
R01049_c	C00002_c + C00117_c = C00020_c + C00119_c	0	500	2.7.6.1
R01056_c	C00117_c = C00199_c	-500	500	5.3.1.6
R01057_c	C00620_c = C00117_c	-500	500	5.4.2.2
R01061_c	C00003_c + C00009_c + C00118_c = C00004_c + C00080_c + C00236_c	-500	500	1.2.1.12
R01066_c	C00673_c = C00084_c + C00118_c	-500	500	4.1.2.4
R01070_c	C05378_c = C00111_c + C00118_c	-500	500	4.1.2.13
R01082_m	C00149_m = C00001_m + C00122_m	-500	500	4.2.1.2
R01083_c	C03794_c = C00020_c + C00122_c	-500	500	4.3.2.2
R01126_c	C00001_c + C00130_c = C00009_c + C00294_c	-500	500	3.1.3.5
R01130_c	C00001_c + C00003_c + C00130_c = C00004_c + C00080_c + C00655_c	-500	500	1.1.1.205
R01132_c	C00119_c + C00262_c = C00013_c + C00130_c	0	500	2.4.2.8
R01135_c	C00044_c + C00049_c + C00130_c = C00009_c + C00035_c + C03794_c	-500	500	6.3.4.4
R01137_c	C00002_c + C00206_c = C00008_c + C00131_c	-500	500	2.7.4.6
R01229_c	C00119_c + C00242_c = C00013_c + C00144_c	-500	500	2.4.2.8
R01231_c	C00001_c + C00002_c + C00064_c + C00655_c = C00013_c + C00020_c + C00025_c + C00144_c	-500	500	6.3.5.2
R01234_c	C00001_c + C00942_c = C00144_c	0	500	3.1.4.17
R01248_c	C00003_c + C00148_c = C00004_c + C00080_c + C03912_c	-500	500	1.5.1.2
R01251_c	C00006_c + C00148_c = C00005_c + C00080_c + C03912_c	0	0	1.5.1.2
R01325_m	C00158_m = C00001_m + C00417_m	-500	500	4.2.1.3
R01326_c	C00002_c + C00159_c = C00008_c + C00275_c	-500	500	2.7.1.1
R01397_c	C00049_c + C00169_c = C00009_c + C00438_c	-500	500	2.1.3.2
R01512_c	C00008_c + C00236_c = C00002_c + C00197_c	-500	500	2.7.2.3
R01518_c	C00197_c = C00631_c	-500	500	5.4.2.1
R01528_c	C00006_c + C00345_c = C00005_c + C00011_c + C00080_c + C00199_c	-500	500	1.1.1.44
R01529_c	C00199_c = C00231_c	-500	500	5.1.3.1
R01560_c	C00001_c + C00212_c = C00014_c + C00294_c	-500	500	3.5.4.4
R01561_c	C00147_c + C00620_c = C00009_c + C00212_c	-500	500	2.4.2.1
R01600_c	C00002_c + C00221_c = C00008_c + C01172_c	-500	500	2.7.1.1
R01641_c	C00118_c + C05382_c = C00117_c + C00231_c	-500	500	2.2.1.1
R01736_c	C00001_c + C03451_c = C00051_c + C00256_c	-500	500	3.1.2.6
R01786_c	C00002_c + C00267_c = C00008_c + C00668_c	-500	500	2.7.1.1
R01787_c	C00005_c + C00080_c + C00267_c = C00006_c + C00794_c	-500	500	1.1.1.21
R01818_c	C00275_c = C00636_c	-500	500	5.4.2.8
R01819_c	C00275_c = C05345_c	-500	500	5.3.1.8
R01827_c	C00118_c + C05382_c = C00279_c + C05345_c	-500	500	2.2.1.2
R01830_c	C00118_c + C05345_c = C00231_c + C00279_c	-500	500	2.2.1.1
R01857_c	C00002_c + C00361_c = C00008_c + C00286_c	-500	500	2.7.4.6
R01863_c	C00009_c + C00294_c = C00262_c + C00620_c	-500	500	2.4.2.1
R01867_c	C00007_c + C00337_c = C00027_c + C00295_c	-500	500	1.3.3.1
R01870_c	C00013_c + C01103_c = C00119_c + C00295_c	-500	500	2.4.2.10
R01900_m	C00001_m + C00417_m = C00311_m	-500	500	4.2.1.3
R01993_c	C00001_c + C00337_c = C00438_c	-500	500	3.5.2.3
R02016_c	C00006_c + C00342_c = C00005_c + C00080_c + C00343_c	-500	500	1.8.1.9
R02017_c	C00008_c + C00342_c = C00001_c + C00206_c + C00343_c	-500	500	1.17.4.1
R02018_c	C00001_c + C00343_c + C01346_c = C00015_c + C00342_c	-500	500	1.17.4.1
R02019_c	C00035_c + C00342_c = C00001_c + C00343_c + C00361_c	-500	500	1.17.4.1
R02023_c	C00001_c + C00343_c + C00460_c = C00075_c + C00342_c	-500	0	1.17.4.1
R02024_c	C00001_c + C00343_c + C00705_c = C00112_c + C00342_c	-500	0	1.17.4.1
R02035_c	C00001_c + C01236_c = C00345_c	-500	500	3.1.1.31
R02093_c	C00002_c + C00363_c = C00008_c + C00459_c	-500	500	2.7.4.6
R02094_c	C00002_c + C00364_c = C00008_c + C00363_c	-500	500	2.7.4.9
R02098_c	C00002_c + C00365_c = C00008_c + C01346_c	-500	500	2.7.4.9
R02100_c	C00001_c + C00460_c = C00013_c + C00365_c	0	500	3.6.1.23
R02101_c	C00143_c + C00365_c = C00364_c + C00415_c	-500	500	2.1.1.45
R02142_c	C00013_c + C00655_c = C00119_c + C00385_c	-500	500	2.4.2.8
R02222_generalised_c	C00007_c + 2.0 C00080_c + C00162_c + 2.0 C00999_c = 2.0 C00001_c + 2.0 C00996_c + DesatFA_c	0	500	1.14.19.1
R02325_c	C00001_c + C00458_c = C00014_c + C00460_c	-500	500	3.5.4.13
R02326_c	C00002_c + C00705_c = C00008_c + C00458_c	-500	500	2.7.4.6
R02331_c	C00002_c + C01346_c = C00008_c + C00460_c	-500	500	2.7.4.6
R02530_c	C03451_c = C00051_c + C00546_c	-500	500	4.4.1.5
R02531_c	C00003_c + C05999_c = C00004_c + C00080_c + C00546_c	-500	500	1.1.1.21
R02569_a	C00024_a + C15973_a = C00010_a + C16255_a	-500	500	2.3.1.12
R02570_m	C00010_m + C16254_m = C00091_m + C15973_m	-500	500	2.3.1.61
R02577_c	C00006_c + C00583_c = C00005_c + C00080_c + C05999_c	-500	500	1.1.1.21
R02736_c	C00006_c + C01172_c = C00005_c + C00080_c + C01236_c	-500	500	1.1.1.49
R02739_c	C00668_c = C01172_c	-500	500	5.3.1.9
R02740_c	C00668_c = C05345_c	-500	500	5.3.1.9
R03270_a	C05125_a + C15972_a = C00068_a + C16255_a	-500	500	1.2.4.1
R03314_c	C01165_c = C00001_c + C03912_c	-500	500	unknown
R03316_m	C05381_m + C15972_m = C00068_m + C16254_m	-500	500	1.2.4.2
R03321_c	C01172_c = C05345_c	-500	500	5.3.1.9
R03425_c	C00037_c + C02051_c = C00011_c + C01242_c	-500	500	1.4.4.2
R03666_c	C01672_c = C06181_c	-500	500	2.1.2.8
R03682_v	C00007_v + C01708_v = C05781_v	-500	500	unknown
R03815_c	C00003_c + C02972_c = C00004_c + C00080_c + C02051_c	0	500	1.8.1.4
R04125_c	C00101_c + C01242_c = C00014_c + C00143_c + C02972_c	0	0	2.1.2.10
R04385_a	C00002_a + C00288_a + C06250_a = C00008_a + C00009_a + C04419_a	-500	500	6.3.4.14
R04386_balanced_a	C00024_a + C00080_a + C04419_a = C00083_a + C06250_a	-500	500	6.4.1.2
R04779_c	C00002_c + C05345_c = C00008_c + C05378_c	-500	500	2.7.1.11
R05188_simplified_a	14.0 C00005_a + C00024_a + 14.0 C00080_a + 7.0 C00083_a = 7.0 C00001_a + 14.0 C00006_a + 8.0 C00010_a + 7.0 C00011_a + C00638_a	-500	500	2.3.1.85
R05692_c	C00006_c + C00325_c = C00005_c + C00080_c + C01222_c	-500	500	1.1.1.271
R07618_a	C00003_a + C15973_a = C00004_a + C00080_a + C15972_a	-500	500	1.8.1.4
R07618_m	C00003_m + C15973_m = C00004_m + C00080_m + C15972_m	-500	500	1.8.1.4
R08539_balanced_c	C00005_c + 2.0 C00996_c = C00006_c + C00080_c + 2.0 C00999_c	0	500	1.6.2.4
Rlactate_btoc_s	C00256_b = C00256_c	' . $_GET['dlactate'] . '	' . $_GET['dlactate'] . '	unknown
SFAE_a	C00004_a + C00005_a + 2.0 C00080_a + C00083_a = C00001_a + C00003_a + C00006_a + C00010_a + C00011_a + FAC2H4unit_a	-500	500	4.2.1.58
Slactate_btoc_s	C00186_b = C00186_c	' . $_GET['llactate'] . '	0	unknown
Urea_btoc_s	C00086_b = C00086_c	-500	0	unknown
alanine_btoc_s	C00041_b = C00041_c	-500	0	unknown
alanine_vtoc_s	C00041_v = C00041_c	-500	500	unknown
arginine_btoc_s	C00062_b = C00062_c	-1	1	unknown
arginine_vtoc_s	C00062_v = C00062_c	-500	500	unknown
asparagine_btoc_s	C00152_b = C00152_c	-500	500	unknown
asparagine_vtoc_s	C00152_v = C00152_c	-500	500	unknown
aspartate_btoc_s	C00049_b = C00049_c	-5	5	unknown
aspartate_vtoc_s	C00049_v = C00049_c	-500	500	unknown
cysteine_btoc_s	C00097_b = C00097_c	-500	500	unknown
cysteine_vtoc_s	C00097_v = C00097_c	-500	500	unknown
glutamate_btoc_s	C00025_b = C00025_c	-0.1	0.1	unknown
glutamate_vtoc_s	C00025_v = C00025_c	-500	500	unknown
glutamine_vtoc_s	C00064_v = C00064_c	-500	500	unknown
glutathione_btoc_s	C00051_b = C00051_c	-500	0	unknown
glycine_btoc_s	C00037_b = C00037_c	-500	500	unknown
glycine_vtoc_s	C00037_v = C00037_c	-500	500	unknown
histidine_btoc_s	C00135_b = C00135_c	-500	500	unknown
histidine_vtoc_s	C00135_v = C00135_c	-500	500	unknown
isoleucine_btoc_s	C00407_b = C00407_c	-500	500	unknown
leucine_vtoc_s	C00123_v = C00123_c	-500	500	unknown
lysine_btoc_s	C00047_b = C00047_c	-500	500	unknown
lysine_vtoc_s	C00047_v = C00047_c	-500	500	unknown
methionine_btoc_s	C00073_b = C00073_c	-500	500	unknown
methionine_vtoc_s	C00073_v = C00073_c	-500	500	unknown
phenylalanine_btoc_s	C00079_b = C00079_c	-500	500	unknown
phenylalanine_vtoc_s	C00079_v = C00079_c	-500	500	unknown
proline_btoc_s	C00148_b = C00148_c	-2	2	unknown
proline_vtoc_s	C00148_v = C00148_c	-500	500	unknown
serine_btoc_s	C00065_b = C00065_c	-500	500	unknown
serine_vtoc_s	C00065_v = C00065_c	-500	500	unknown
threonine_btoc_s	C00188_b = C00188_c	-500	500	unknown
threonine_vtoc_s	C00188_v = C00188_c	-500	500	unknown
tryptophan_btoc_s	C00078_b = C00078_c	-500	500	unknown
tryptophan_vtoc_s	C00078_v = C00078_c	-500	500	unknown
tyrosine_btoc_s	C00082_b = C00082_c	-500	0	unknown
tyrosine_vtoc_s	C00082_v = C00082_c	-500	500	unknown
valine_btoc_s	C00183_b = C00183_c	-500	0	unknown
valine_vtoc_s	C00183_v = C00183_c	-500	500	unknown'
	);
	fclose($fh);
}

?>