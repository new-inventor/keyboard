<?php
namespace KeyboardAnalytics\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Array
 * (
 * [E] => R|D|N|S|A|T|L|E|W|M|C|I|H|O|F|P|V|Y|B|G|X|K|U|Q|J|Z
 * [T] => H|O|E|I|T|A|S|W|R|L|U|Y|M|B|C|F|D|N|P|G|K|V|J|Q|Z|X
 * [A] => N|T|S|R|L|D|I|C|V|Y|M|B|G|P|W|K|F|U|H|Z|A|O|Q|X|J|E
 * [O] => U|N|R|F|T|M|W|O|S|L|D|H|K|P|B|V|A|C|I|G|Y|E|X|J|Q|Z
 * [I] => N|T|S|D|M|C|L|E|O|R|G|F|V|A|H|W|K|B|P|Z|X|I|U|Q|J|Y
 * [N] => D|T|G|E|O|A|S|I|C|H|Y|W|N|L|F|K|M|B|U|V|P|R|J|Q|X|Z
 * [H] => E|A|I|O|T|U|H|R|S|Y|W|M|C|L|B|F|N|D|P|G|V|J|K|Q|Z
 * [S] => T|E|H|A|O|I|S|U|W|P|C|M|L|N|B|F|D|K|Y|R|G|V|Q|J|Z
 * [R] => E|I|O|A|S|T|Y|D|R|N|H|M|W|C|L|U|F|B|K|P|G|V|J|Q|X|Z
 * [D] => I|E|T|A|O|S|H|W|B|N|R|M|L|Y|D|F|C|U|G|P|V|J|K|Q|Z
 * [L] => E|L|I|Y|O|A|D|T|S|F|U|M|W|H|K|B|P|N|R|C|V|G|J|Q|Z
 * [U] => R|T|S|L|N|G|C|P|E|A|I|M|D|B|W|H|F|K|O|Y|V|Z|U|X|J|Q
 * [M] => E|A|I|O|Y|P|U|R|S|T|B|M|H|W|F|N|C|L|D|G|V|J|Q|K|Z
 * [W] => A|H|E|I|O|N|S|T|R|W|L|M|D|Y|F|C|B|U|P|G|K|V|Q|J|Z
 * [C] => O|E|H|A|T|K|L|I|R|U|C|Y|Q|S|W|F|M|P|B|Z|D|G|N|V|J
 * [F] => O|T|A|I|E|R|F|H|U|L|S|M|W|Y|C|B|P|D|G|N|V|J|K|Q|Z
 * [Y] => O|T|S|A|E|I|W|H|M|B|D|F|C|L|P|R|N|G|Y|U|K|V|J|Q|Z
 * [G] => H|E|A|O|I|T|R|S|L|U|W|M|N|B|F|G|C|D|Y|P|V|J|K|Q|Z
 * [P] => E|A|O|R|L|P|I|T|U|S|H|Y|W|F|M|B|N|C|D|G|J|V|Q|K
 * [B] => E|U|L|O|Y|A|R|I|S|T|J|B|V|H|D|M|W|C|N|F|P|G
 * [V] => E|I|A|O|Y|U|N|T|R|L|M|H|V
 * [K] => E|I|N|A|S|T|H|O|W|L|F|Y|M|B|U|C|P|D|R|G|K|V|J|Q
 * [X] => P|C|T|I|E|A|H|O|X|U|W|M|S|V|Y|F|L|B|Q|R|N|D|K|G
 * [J] => U|O|E|A|R|I|F|M
 * [Q] => U|T|O|C
 * [Z] => A|E|Z|I|Y|L|W|O|G|B|T|S|H|V|F|U|C|N
 * )
 *
 * x100
 * Array
 * (
 * [835] => HE
 * [828] => TH
 * [526] => ER
 * [524] => IN
 * [447] => AN
 * [383] => RE
 * [346] => HA
 * [342] => ED|OU
 * [340] => ND
 * [315] => TO
 * [307] => AT
 * [305] => EN
 * [299] => ES
 * [291] => EA
 * [287] => ON
 * [271] => ST
 * [270] => HI
 * [269] => NT
 * [265] => NG
 * [259] => AS
 * [253] => IT
 * [243] => IS
 * [236] => ET
 * [223] => OR
 * [219] => AR
 * [214] => TE
 * [212] => TI
 * [205] => SE
 * [197] => VE
 * [194] => ME
 * [188] => OF
 * [186] => SH
 * [182] => NE
 * [181] => NO
 * [173] => LE
 * [171] => EL
 * [167] => LL
 * [164] => SA
 * [162] => WA
 * [157] => AL
 * [156] => OT
 * [152] => TT
 * [150] => RI
 * [149] => BE
 * [146] => RO
 * [143] => HO|OM
 * [141] => TA|SO
 * [139] => DI
 * [138] => SI|LI
 * [137] => EE
 * [136] => DE
 * [135] => EW
 * [134] => WH
 * [131] => RA|YO|CO
 * [126] => OW
 * [125] => UR|SS
 * [122] => EM|DT|AD
 * [119] => DA
 * [117] => RS|WE
 * [116] => EC|WI
 * [114] => RT|CE
 * [113] => UT|MA
 * [110] => LY
 * [109] => EI|FO
 * [108] => CH|OO
 * [106] => DO
 * [104] => GH
 * [103] => AI
 * [101] => ID
 * [100] => LO
 * [99] => LA|US
 * [98] => CA
 * [97] => EH
 * [95] => UL|LD
 * [94] => IM
 * [92] => IC|NA
 * [89] => NS
 * [88] => IL|TS
 * [85] => NI
 * [83] => HT
 * [80] => PE
 * [79] => AC
 * [78] => TW|IE
 * [77] => UN|NC|EO
 * [76] => KE|OS|EF
 * [75] => FT|DS
 * [74] => DH|WO
 * [73] => IO|EP|MI
 * [72] => MO
 * [71] => GE
 * [69] => AV
 * [68] => TR|AY|AM|OL
 * [66] => IR
 * [65] => EV
 * [63] => EY
 * [62] => GA
 * [60] => SU
 * [59] => FA|FI|GO
 * [58] => FE|IG
 * [57] => PA|SW
 * [56] => RY|RD
 * [55] => PO
 * [54] => AB
 * [53] => OD|RR
 * [52] => TL|IF|PR
 * [50] => BU|EB
 * [49] => MY
 * [48] => NH|YT
 * [46] => YS|SP|CT|FR
 * [45] => TU|YA|UG|BL|AG|TY
 * [44] => AP|DW
 * [43] => DB
 * [42] => RN|UC
 * [41] => DN|PL
 * [40] => DR|RH
 * [39] => EG|SC|GI
 * [38] => LT|RM|GT|UP
 * [37] => BO|IV|CK|OH
 * [36] => OK|OP|FF|YE
 * [35] => GR
 * [34] => OB|OV|KI|AW|IA|AK
 * [33] => DM|YI|VI|NY
 * [32] => OA|OC|SM
 * [31] => OI|RW|MP|RC|TM
 * [30] => MU|AF|RL|CL|NW|LS
 * [29] => YW|EX|LF
 * [28] => SL|SN|DL|DY|SB|PP|WN|TB|DD
 * [27] => BY|HU|QU
 * [26] => YH|SF|DF
 * [25] => PI|TC|FH|NN|RU|KN|NL|UE
 * [24] => BA|MR|UA|CI
 * [23] => BR|GS|RF|MS|GL
 * [22] => UI|FU|DC
 * [21] => DU|TF|AU|CR|PT|MT
 * [20] => NF|NK|RB|UM
 * [19] => HH|LU
 * [18] => CU|DG|HR|NM|RK|VA
 * [17] => IH|IW|YM|YB|FL|OG|YD|UD
 * [16] => LM|MB|YF|TD|IK|YC|RP|RG|SD
 * [15] => TN|GU|PU
 * [14] => MM|HS|IB|HY|SK
 * [13] => NB|FS|NU|BI|OY|RV|DP|EK
 * [12] => UB|SY|LW|CC|HW|PS|IP|KA|OE|HM
 * [11] => WS|EU|GW|SR|WT|TP|IZ|KS|YL|LH|LK|FM|YP
 * [10] => SG|CY|JU|XP|JO|MH|KT|PH|LB|VO
 * [9] => HC|GM|FW|AH|GN|NV
 * [8] => YR|FY|WR|TG|KH|UW|MW|YN|LP|GB
 * [7] => EQ|KO|GF|XC|ZA|BS|WW|NP|NR|FC
 * [6] => YG|LN|UH|JE|XT|LR|DV|LC|GG
 * [5] => LV|SV|ZE|MF|HL|HB|UF|KW|WL|FB|WM
 * [4] => TK|HF|MN|JA|GC|FP|YY|FD|EJ|BT|GD|HN|DJ|KL
 * [3] => LG|GY|KF|IX|PY|BJ|NJ|HD|WD|XI|NQ|XE|XA|MC|YU|GP|KY|WY|SQ|ML
 * [2] => FG|WF|DK|SJ|HP|WC|PW|UK|AZ|KM|BB|FN|AA|TV|UO|OX|KB|WB|YK|TJ
 * [1] => HG|CQ|RJ|MD|ZZ|II|YV|MG|AO|PF|IU|DQ|WU|ZI|PM|NX|KU|TQ|UY|OJ
 * [0] => OQ|UV|KP|GV|FV|AJ|RQ|KD|WG|OZ|MV|HV|KR|PN|HJ|XH|WK|KG|FJ|ZL
 * )
 * Array
 * (
 * [483] => THE
 * [241] => AND
 * [215] => ING
 * [197] => HER
 * [131] => THA
 * [124] => ERE
 * [117] => HAT
 * [108] => YOU
 * [101] => SHE
 * [100] => HIS
 * [94] => WAS
 * [92] => ENT
 * [88] => THI
 * [87] => ETH|FOR
 * [77] => NOT
 * [75] => NTH
 * [74] => ITH
 * [73] => TER
 * [72] => INT|DTH|VER
 * [70] => ALL
 * [67] => OTH|HES
 * [64] => OUL|TTH
 * [63] => WIT|GHT
 * [60] => ION
 * [59] => ULD|EAR
 * [57] => REA|OME
 * [56] => AVE|HIN
 * [55] => EDT
 * [54] => ERS|ATH
 * [53] => EVE|HAD|ATI|OUR
 * [52] => EAN|HEN|EST
 * [51] => HEW|RES
 * [50] => ESS
 * [49] => ONE
 * [48] => HOU|NCE|HEA|FTH|OUT|OFT
 * [47] => AST
 * [46] => HIM
 * [45] => RTH|TIO|HAV|STH
 * [44] => EDA|ETO|HEM|ONT|EWA
 * [43] => IGH|ATT
 * [42] => NTO|TIN|WHI
 * [41] => RED|BUT|EDI|ERA|NDT|ERT
 * [40] => ILL|ORE|DIN|HAN
 * [39] => UGH|HED|DTO|EOF
 * [38] => STO|WHE|RAN|ARE|SIN|AID|HEC|TAN|THO|MAN|ESA|TED
 * [37] => ERI|NGT|EAT|WER
 * [36] => STA|EHA|COU
 * [35] => ATE|RIE|AIN|NOW|SAN|COM|ORT|HEH
 * [34] => EIN|OUG|NDI|ECO|INE|ELL|SAI
 * [33] => RIN|EAS|EEN|OUN|HEL|NIN|ANT|CON|NDS
 * [32] => OUS|DHE|IND|RET|ISH|EHE
 * [31] => IST|HIC|DAN|TOT|STE|ELI|NDE|ASS
 * [30] => ICH|OVE|LIN|MEN|SHA|YTH|TOF
 * [29] => TTE|SEE|IVE|NGA|MIN|DNO|SOM
 * [28] => EDH|UST|NED|ERY|BLE|TON|EME|ART
 * [27] => LEA|SOF|ROU|EFO|FRO|INA|ARR|EMA
 * [26] => OSE|SHO|ROM|RRI|CHA|EDO|DON|STR|ONS|WOU|OOK|NTE|OOD|END|UND|MET|PER|ARD|SEL|CAR
 * [25] => TEN|HET|URE|ITI|EAD|OWN|NDA|MOR|RST|WHA|ITT|KIN|ESH|TLE
 * [24] => HEI|ECT|IDE|ENE|NHE|SWE|ENO|TTO
 * [23] => ESE|HOW|AME|TUR|STI|ANY|USE|TWA|DER|HEY|WHO|VEN|HTH|KED|ESO|UCH|NES
 * [22] => SED|NTI|HEP|INS|NAN|DBE|ERH|TOH|ASA|LOO|EWH|NGS|SSI
 * [21] => ANC|ITW|GTH|ASI|EAL|NGE|TIS|ENC|NDH|URS|AKE|LED|HEF|ERO|LIT
 * [20] => SIT|ELF|PRO|ENI|PRE|ISA|WAY|LLY|SNO|ECA|MEA|ONA|LES|REW|LET|ISS
 * [19] => NDW|TWO|NGH|IME|TIM|BEE|TOO|DEA|EYO|NDO|OFH|RSE|TRE|ETT|DIS|WIL|ABL|ISE|EWI|DHI
 * [18] => NGI|LON|TOB|SON|YAN|ACE|EBE|BET|ONO|DID|TOM|DRE|TIT|KNO|ERW|TYO|HAL
 * [17] => HAS|YIN|IED|LTH|ITS|MED|LLI|HEB|TRA|SSE|OBE|UTT|EWO|SEN|WOR|IRE|RTO|TAL|DIT|RAT
 * [16] => DOW|APP|SSO|ITE|OLD|PAR|HAR|ATS|TOS|EMO|REC|GIN|NGO|RHE|ASH|ANG|ANS|MES|EWE|OWE
 * [15] => RIT|REI|DED|TBE|CHI|EIS|AGE|PLA|FTE|NLY|INC|NER|UTI|NTA|OFA|NAT|ERF|LLE|VED|TLY
 * [14] => ORD|GRE|ABO|TEL|HEE|ICA|QUI|ICE|GTO|NEW|IHA|WIN|MUS|TTL|INH|ILE|IEN|LLO|RNE|ASE
 * [13] => EHI|OFF|ACK|SSH|LYA|EET|DWI|NHI|DOF|EDW|ENA|CTI|ANI|NST|SAT|ELA|DHA|OOR|ETI|TIL
 * [12] => OND|SUR|ANA|LOW|TOA|ISI|LDN|ACT|WAR|REP|TIC|SUC|YTO|MON|DSO|PEN|SWH|IMA|SEA|ONL
 * [11] => PON|IES|BEA|AIR|EED|ORM|PEA|GAI|RSA|STW|LIE|YES|AWA|DWH|EEP|ANE|NEV|LIG|TOL|ROO
 * [10] => INI|TAS|IRS|ATW|LAC|LIF|EMI|NSH|NDM|SST|RIS|RAL|ADA|RHA|EPR|TAK|OLL|CAT|DFO|TEA
 * [9] => REH|NAL|LDH|TRO|REF|ISP|RDA|NSE|ARS|ERN|IFF|MEI|WEN|ERL|IAM|ADY|WOO|MAT|YOF|OLE
 * [8] => LAD|ADB|MOS|WTH|ULL|IDI|ECE|CER|TRI|MAK|OFS|FEL|EFI|OSS|OUA|ETW|AMI|TTI|DCA|DSA
 * [7] => RME|EAV|EAK|EQU|IDO|NDC|NEO|ARY|DOO|MIG|MRS|NAS|MBE|CAS|ETR|MEO|KET|NGB|ATM|BEI
 * [6] => OMM|IMI|NSA|IDH|WAL|OUC|TAR|HTS|ILI|GLE|VEH|URA|PED|SKE|EGO|DWE|GAR|LEF|AUG|OSI
 * [5] => UES|DNE|ALM|INM|OFC|OCO|SEW|COR|NTW|ASU|RLI|NEE|NDY|NDN|YWI|ORK|MEH|ACC|ARN|LIC
 * [4] => URP|RIO|LLW|EMY|EDC|SLO|HCL|AIL|FEW|FAI|DNT|EGI|EOT|ISB|ECI|EEX|NTY|HEV|FAL|IRI
 * [3] => DRI|EUP|TSU|FMY|ATR|RYA|SIM|TDI|OAT|DEC|URC|ASD|LRE|TOI|ISR|UTY|EUN|SCH|CEL|GOD
 * [2] => NUT|UNI|PLY|GOU|MSO|LEG|DYE|URH|GAV|ICT|SPL|MRD|GLI|AYE|LLC|OFR|UDD|YED|TIW|RAY
 * [1] => YNE|MYW|YOR|NOI|KSA|NFA|DAP|WNS|MID|DGI|IWE|LLU|NEB|RKI|UCC|TEH|UCE|HFO|IRD|MSH
 * [0] => FDI|HTC|PSH|BAS|LDU|GEB|DOH|DKE|LYY|LTR|LOA|NYE|ASJ|ABU|UDY|NYI|FDO|CIV|MOD|YUP
 * )
 *
 *
 *
 *
 * [О] => В|С|Н|Т|Л|Р|М|Д|Г|Б|К|Й|П|Е|Ч|И|Ж|О|З|Ш|Я|Ю|Х|У|Ф|Э|А|Щ|Ц|Ь|Ё
 * [А] => Л|Н|Т|К|С|В|З|Р|М|Я|Д|П|Е|Ш|И|Ж|Б|Г|О|Ч|Х|Ю|Й|Ф|У|Э|Щ|А|Ц
 * [Е] => Н|Р|С|Л|М|Т|Г|Д|В|П|Й|Е|Б|К|З|О|Ч|И|Ж|Х|Ш|Щ|У|Я|Ю|Ц|Э|А|Ф|Ё
 * [И] => Н|Л|С|В|Т|М|З|Е|К|И|Д|П|Я|Х|Ч|О|Й|Б|Ц|Р|Г|Ж|Ш|У|Ю|А|Э|Ф|Щ|Ь|Ъ
 * [Н] => А|О|Е|И|Ы|Н|Я|У|Д|С|Ь|Ц|Т|П|В|К|Ч|Б|Г|Р|З|Ю|Щ|М|Х|Ж|Л|Э|Ш|Ф|Ъ|Ё
 * [Т] => О|А|Ь|Р|Е|И|В|У|Ы|Н|С|К|Я|П|Д|Т|Ч|Л|Б|М|Г|Ц|З|Э|Ж|Ю|Ъ|Х|Ф|Щ|Ш|Ё|Й
 * [С] => Т|К|О|Я|Е|Л|Ь|В|П|И|А|Н|С|М|У|Ё|Д|Р|Ч|Ы|Х|Б|Г|Ю|Ж|Ш|З|Э|Ф|Ц|Ъ|Щ
 * [Л] => О|А|И|Е|Ь|Я|С|У|К|Ю|Ы|Н|П|В|Д|Ч|Ж|Г|Т|Б|Р|Л|З|М|Э|Ш|Ф|Х|Ц|Щ|Ё|Й
 * [В] => О|А|Е|И|С|Ы|Н|М|Р|Л|Ш|П|У|К|Т|Д|З|В|Г|Э|Б|Я|Ч|Ь|Х|Ж|Ц|Ф|Ъ|Щ|Ю|Ё|Й
 * [Р] => А|О|Е|И|У|Ы|С|Я|Ь|В|Н|Т|Д|Г|М|Ж|К|Ш|П|Б|Ю|Х|Л|Ч|Ц|З|Р|Щ|Ф|Э|Й|Ё
 * [К] => О|А|И|Н|Р|У|В|Т|Е|С|Л|Б|П|К|Д|Ж|М|Ч|Г|Э|З|Я|Х|Ш|Ц|Ф|Ю|Щ|Ё|Ь|Й
 * [Д] => Е|А|О|И|Р|Н|У|В|Г|Л|Ы|С|Я|Ь|К|Т|П|Ъ|М|Ш|Ц|Б|Д|Ч|Х|З|Ю|Э|Ж|Ф|Ё|Щ|Й
 * [М] => О|И|Е|А|У|Н|П|С|Ы|В|К|Я|Ч|Д|Г|Б|Т|Л|М|Р|З|Ж|Э|Х|Ш|Ф|Ц|Ь|Ю|Щ|Ё|Й
 * [У] => Д|С|Т|Г|Ж|В|Л|К|М|П|Ч|З|Ю|Н|Р|Б|Ш|И|Х|О|Е|Щ|А|Я|У|Э|Й|Ф|Ц|Ь
 * [П] => О|Р|Е|А|Ь|И|Л|У|Я|Ы|Ч|Н|К|П|Т|Ф|Ц|С|Ш|Г|В|Щ|Э|М|Б|Д|З|Х|Ж
 * [Я] => Н|Т|С|В|З|Д|Л|П|К|И|О|М|Ж|Б|Г|Е|Ч|Р|Х|А|Щ|Я|У|Э|Ю|Ц|Ш|Ф|Й
 * [Г] => О|Л|Р|Д|А|И|У|Е|Н|В|С|П|К|Г|Б|Ч|З|Т|М|Э|Ж|Я|Ш|Ф|Х|Ц|Ю|Ь|Ы|Щ|Й
 * [Ь] => Н|С|Е|К|В|И|П|О|Я|М|Ш|Т|Ю|А|Ч|Б|Д|З|Г|Р|У|Э|Л|Ц|Х|Ж|Ф|Щ|Й|Ё
 * [Ы] => Л|М|В|Й|Е|С|Х|Т|Н|Б|П|Ш|И|Р|К|Д|О|Ч|З|Г|У|Ж|Э|А|Я|Ф|Ц|Щ|Ю
 * [З] => А|Д|Н|В|О|Ь|Ы|Я|Г|И|С|М|У|Е|Р|К|Л|Б|П|Ж|З|Т|Ю|Э|Ч|Ш|Ъ|Ц|Ф|Х|Щ
 * [Б] => Ы|О|Е|Р|У|А|Л|И|Я|Н|К|Щ|Ъ|Х|В|С|М|Э|Ь|Д|Ч|Б|Г|З|Т|Ж|П|Ш|Ю|Ц|Ё
 * [Ч] => Т|Е|А|И|У|Н|К|Ь|Г|Ш|О|Л|Р|В|П|С|Б|М|Д|Ч|З|Э|Я|Х|Ж|Ф|Ю
 * [Й] => С|Н|П|В|Д|К|И|Т|О|М|Р|Б|Г|Ч|Л|Ш|А|У|З|Ж|Е|Ф|Х|Ц|Э|Я|Ю|Щ|Й
 * [Ж] => Е|И|А|Н|Д|У|К|Б|О|Ь|Ч|Ю|С|Ж|В|М|Г|Т|Э|П|Л|З|Я|Р|Х|Ш|Ё|Ф
 * [Ш] => Е|И|А|Л|К|Н|У|О|Ь|Т|П|В|М|Б|С|Р|Д|Э|Г|Ш|Ц|З|Ч|Ж|Я|Ю|Ф|Х|Ы|Ё
 * [Х] => О|А|И|В|С|П|Н|Л|Р|У|К|Д|М|Т|Б|Г|Е|З|Ч|Ж|Э|Ш|Ф|Я|Х|Ц|Ъ|Щ|Ю|Й
 * [Ю] => Д|Т|Б|Щ|С|И|В|Н|П|К|Ч|О|Р|М|Л|Г|Ш|У|А|З|Ж|Е|Ц|Ю|Э|Я|Х|Ф
 * [Ц] => Е|У|А|О|И|Ы|К|В|С|П|Н|Г|Т|М|Б|Д|Р|Л|З|Э|Ч|Я|Ж|Ш|Ф|Х
 * [Э] => Т|Л|К|С|П|Н|Р|Й|Х|М|Д|Г|З|В|Ф|Ц|Э|Ч|Ш|Б|Е|И|О
 * [Щ] => Е|И|А|У|Н|Ь|Р|В|К|З|Д|С|П|Ё|Т|О|Б|М|Э|Ф
 * [Ф] => Р|И|А|Е|О|У|Л|С|Т|В|П|Н|Ы|К|Б|М|З|Ф|Г|Ь|Д|Я|Ю|Ч|Ж|Х|Ш|Э|Ц
 * [Ё] => Т|Э|Б|В|С|Ч|П|Р|О|Д|Н|З|К|Е|У|И|Л|Г|М|Х|Ж|Ш|А|Ц|Я|Ф
 * [Ъ] => Е|Ю|Я|Ё|В|О|И|У|К
 *
 * x100
 * Array
 * (
 * [468] => ТО
 * [454] => СТ
 * [324] => НА|ОВ
 * [280] => ОС
 * [276] => ГО
 * [275] => ЕН
 * [274] => НО|НЕ
 * [272] => АЛ
 * [268] => ПО
 * [265] => КО
 * [264] => ОН
 * [263] => РА
 * [256] => НИ
 * [254] => КА
 * [245] => ВО
 * [243] => РО
 * [241] => ОТ
 * [218] => ОЛ
 * [217] => ЕР
 * [214] => ЛО
 * [208] => ЛА|ОР
 * [206] => АН
 * [202] => ЛИ
 * [196] => ЕС
 * [192] => ЕЛ|ПР
 * [186] => РЕ
 * [177] => ВА
 * [173] => ОМ
 * [172] => ОД
 * [170] => ТА
 * [169] => АТ
 * [162] => ТЬ
 * [161] => СК|РИ
 * [160] => ОГ
 * [157] => АК
 * [156] => ЗА|АС
 * [155] => ТР
 * [153] => АВ
 * [150] => ИН
 * [149] => ИЛ
 * [147] => ЕМ
 * [145] => ИС
 * [144] => ЛЕ
 * [140] => ТЕ
 * [139] => ВЕ
 * [137] => ОБ
 * [136] => ДЕ|ИВ
 * [135] => ЕТ
 * [132] => ВИ
 * [131] => ДА
 * [130] => АЗ
 * [123] => ИТ
 * [122] => МО
 * [120] => МИ
 * [119] => ВС
 * [118] => МЕ
 * [116] => ЕГ|БЫ|ТИ
 * [114] => ОК|ДО
 * [113] => ЖЕ
 * [111] => ЛЬ
 * [109] => ЧТ
 * [106] => ИМ
 * [104] => АР|ЕД
 * [103] => ИЗ|ОЙ|АМ
 * [100] => ИЕ
 * [99] => НЫ|ОП
 * [97] => НН
 * [96] => ЕВ|ЧЕ
 * [95] => ТВ
 * [94] => СО
 * [92] => СЯ
 * [90] => ИК
 * [89] => ОЕ
 * [88] => КИ|РУ
 * [87] => МА|СЕ|СЛ
 * [86] => СЬ
 * [79] => НЯ|АЯ
 * [78] => ЕП|ДИ|ПЕ
 * [77] => ВЫ|АД
 * [76] => МУ
 * [75] => АП
 * [73] => ЫЛ
 * [72] => ЕЙ|ИИ|ХО|ОЧ
 * [71] => НУ|ИД|БО
 * [69] => ЭТ|ШЕ
 * [67] => ИП
 * [65] => ЧА|БЕ
 * [64] => ОИ
 * [63] => ОЖ
 * [62] => ИЯ
 * [61] => ОО|КН|СВ
 * [59] => СП|ДР|ЕЕ
 * [58] => УД|ИХ|ЕБ|ЬН
 * [57] => ЕК
 * [56] => ШИ|УС|ЯН|ЯТ|ЛЯ
 * [55] => ЛС
 * [54] => ИЧ|ДН|ЯС
 * [53] => ЕЗ
 * [52] => ЗД|ЬС|ЗН|ГЛ
 * [51] => ЬЕ|ЫМ
 * [50] => ЬК|ЕО|ДУ|ВН
 * [49] => ИО
 * [48] => КР|МН|УТ
 * [47] => ТУ|СИ|РЫ|КУ|РС
 * [45] => СА|АЕ
 * [44] => ЫВ|ЙС|ША
 * [43] => ЧИ|ЯВ|ОЗ|ЫЙ
 * [42] => ТЫ|ИЙ|ТН
 * [41] => ЕЧ|ЖИ|ЖА|УГ|АШ
 * [40] => ТС|ВМ|УЖ|УВ|АИ|ЕИ|АЖ
 * [39] => ЛУ|УЛ|ЯЗ|АБ
 * [38] => ЩЕ|СН
 * [37] => ИБ|АГ|ВР|ГР|СС|ИЦ|ВЛ|ВШ|ЕЖ
 * [36] => АО|ПА|УК|ЖН|ЫЕ
 * [35] => УМ|УП|ОШ|АЧ
 * [34] => ЫС|БР|УЧ|ЛК
 * [33] => ЬВ|НД|ЫХ|ИР|ГД
 * [32] => ЕХ|ЛЮ|БУ|ИГ|АХ|ЯД
 * [31] => ДВ|СМ|УЗ|РЯ
 * [30] => НС|ЛЫ|БА|НЬ|ЯЛ
 * [29] => УЮ|ДГ|ВП|ГА
 * [28] => ЯП|ВУ|РЬ
 * [27] => ЛН|ЦЕ|СУ|УН|ЙН|МП|ЗВ|ОЯ
 * [26] => МС|ПЬ|ГИ|ЬИ|ХА
 * [25] => ЯК|ЫТ|РВ|ЛП|ЯИ|ОЮ
 * [24] => ЬП|МЫ|ДЛ|ПИ
 * [23] => БЛ|БИ|РН|УР|УБ|ЖД
 * [22] => АЮ|ЩИ|ЕШ|ЗО|ПЛ|УШ|ВК
 * [21] => ЫН|НЦ|ВТ|ЛВ|ОХ|ЯО|МВ
 * [20] => КВ|КТ|ГУ|ЙП|ПУ|ЙВ
 * [19] => АЙ|ЬО|ВД|ТК|ЯМ|РТ|СЁ|ЗЬ
 * [18] => КЕ|ГЕ|ВЗ|НТ|ЧУ|ДЫ|ЯЖ|ФР|АФ|КС|ЕЩ|ФИ
 * [17] => ЫБ|ЙД|ЦУ|ЮД|ТЯ|ЮТ|ЗЫ|ЙК|ЬЯ|УИ|ЦА
 * [16] => ИЖ|ЛД|ОУ|ЬМ|МК|ЧН|ЙИ
 * [15] => ДС|ЫП|ЛЧ|ЕУ|ЗЯ|ЕЯ|ВВ|ЫШ|ЮБ|НП
 * [14] => ЬШ|МЯ|ЮЩ|АУ|НВ|ЬТ|ИШ
 * [13] => ЙТ|СД|ИУ|ЗГ|ХИ|ХВ|ЙО|ОФ|ЯБ|ТП|ХС|КЛ|БЯ|МЧ
 * [12] => ВГ|ЯГ|ШЛ|ДЯ|ЮС|ЫИ|ЯЕ|ГН|СР|ЯЧ|ЬЮ|ЛЖ|КБ|ШК|ЗИ|ЬА
 * [11] => ТД|ЬЧ|ЬБ|ЫР|ДЬ|ЕЮ|ЦО|РД|ХП|НК|ЩА|ЗС|ЬД|ШН|ИЮ|ЫК|СЧ|УХ|СЫ
 * [10] => ЬЗ|ТТ|ХН|РГ|ТЧ|УО|РМ|ЙМ|МД|КП|ЗМ|РЖ|ЛГ
 * [9] => КК|ОЭ|МГ|РК|ТЛ|ПЯ|ЙР|ЛТ|ШУ|ЗУ|УЕ|НЧ|МБ
 * [8] => ЮИ|РШ|ЫД|ЯР|ЙБ|БН|ИА|ЙГ|НБ|ШО|АЭ|ТБ|ДК|ЮВ|МТ|ЮН|ЗЕ|УЩ|ЦИ|ЙЧ
 * [7] => ЕЦ|ВЭ|ШЬ|ЯХ|МЛ|ЯА|ЫО|ПЫ|ХЛ|ЫЧ|ЗР|АЩ|ГВ|ГС|ЗК|ДТ|ЧК|НГ|ВБ|ЬГ
 * [6] => ММ|ГП|ЯЩ||АА|БК|ИЭ|РБ|МР|ЯЯ|ЮК|КД|ЛР|ХР|ЯУ|ЕЭ|ЙЛ|ЮЧ|ЗБ|ЮО|БЩ
 * [5] => ХК|ВЧ|КЖ|ЮР|ЪЕ|ЗП|ЫЗ|СХ|ЧЬ|ХД|ЬУ|ТМ|ДЪ|ХМ|СБ|ЕА|ЫГ|КМ|ЬЭ|ЙШ
 * [4] => ВЬ|ДМ|НР|ЖУ|ЙА|НЗ|ЙУ|ФА|ИФ|ЦЫ|ИЩ|МЗ|ОЩ|ФЕ|ЦК|НЮ|ЮМ|ХТ|СГ|ЯЭ
 * [3] => ЛЗ|ДШ|ДЦ|ХГ|ЯЮ|АЦ|ЛМ|ТЦ|ЙЖ|СЮ|ЮЛ|УА|НЩ|УЯ|ЮГ|МЖ|ЪЮ|РХ|ОЦ|СЖ
 * [2] => ЬЦ|ТЖ|ЪЯ|НМ|БХ|ЭЛ|БВ|РЧ|ЧШ|ЁТ|ФО|СЗ|ЩУ|ЖК|КЭ|ХЕ|ПЧ|ЧО|КЗ|РЦ
 * [1] => ДД|ХЧ|ГЧ|МЭ|ЬЖ|ЯЦ|ЖО|МХ|ЁЭ|ДЧ|ЙХ|МШ|ЯШ|ЙЦ|КЯ|ЯФ|ГЗ|ЫЖ|ЙЭ|ГТ
 * [0] => ХЭ|МЮ|ЭП|ЩН|ФС|ЁО|ТФ|ЦС|ВФ|ЦП|ЭН|ЮЯ|ЧП|НФ|КШ|ЁД|ЁН|ШВ|ХШ|БД
 * )
 * Array
 * (
 * [107] => СТР
 * [103] => ОСТ
 * [98] => ЧТО
 * [96] => ЕГО
 * [95] => СТО
 * [92] => ЕНИ
 * [87] => ЕСТ|ОГО
 * [85] => ОТО
 * [74] => ТОР
 * [72] => АЗА
 * [69] => ОВО
 * [68] => ПРИ
 * [65] => СТА|БЫЛ
 * [63] => КАЗ
 * [62] => ПРО
 * [60] => КАК|СКА
 * [59] => СТВ
 * [58] => ОНА|ОРО
 * [57] => АТЬ
 * [56] => ЛОВ
 * [53] => ЕНН|ОКА
 * [52] => ГОВ|ЭТО|ПЕР
 * [51] => ОВА|ОЛЬ
 * [49] => ТРО|АЛА|ЕРЕ
 * [47] => ВОР|АЛИ|ЖЕН
 * [46] => КОТ|ТОВ
 * [44] => ПОД|ПОЛ
 * [43] => НИЕ|ОЛО|ВАЛ
 * [42] => ЗАЛ|ННО
 * [41] => СКО|ОРИ|СВО
 * [40] => НОС
 * [39] => РСТ|ТОМ|ДЕЛ|ОНЕ|ТЕЛ|РОС|СТИ|МЕС|ПОС|РОК
 * [38] => АКО|РАЗ|ЛЕН
 * [37] => ИНА|НОВ|ИЛИ|ТАК|КНЯ|АНИ|ВСЕ|ОВЕ
 * [36] => ТОЛ|РЕД|НАТ
 * [35] => ОБЫ|НИЯ|АСТ|АЛО|ТРС|ПРЕ
 * [34] => ЛСЯ|ИТЬ|ЕЛЬ
 * [33] => ЛЬН|АМИ|РАС|ЕЛА|ВМЕ|КОМ|ЕМУ|НАП|ЕЛО
 * [32] => ИНЕ|ЛОС|ВЕР|РАН|ЗНА|НИК|ГОС|ОПО|КОГ|ИКО
 * [31] => ЕРА|ЕЛИ|ОДИ|ИЗД|АПО|ОПР
 * [30] => ИПО|СТЬ|ТВО|ИТЕ|ОНИ
 * [29] => ЛАС|ЬКО|АНЕ|СКИ|ТЬС|ТОТ|ОВИ|ЫЛО|ТОГ|ИСЬ
 * [28] => РУГ|ВИД|ЫВА|АТА|ОВС|ЛИС|ИВА|ДРУ
 * [27] => ЗДГ|ТОН|НЕС|ОДН|ННЫ|ИСТ|АНА|НОГ
 * [26] => ОМУ|ЕПО|ОСЛ|ЕНЕ|ОЖЕ|НЫМ|ЬЕР|СЛЕ|ТРЕ|ОДО|ЛЬК
 * [25] => НЯЗ|ОЧТ|АНД|ГДА|ПЬЕ|КОН|МЕН|ТВЕ|ООН|ОКО|КОЛ|ОЛЕ
 * [24] => ГЛА|РИЛ|ВОЕ|ИЛА|РАВ|НАС|ТОБ|ВСТ|ХОД|ГРА
 * [23] => ДЕН|ОСК|ЕПР|АТО|НЕП|ЛОН|НЕМ|ОРЫ|ВШИ|ИКА|НИМ|ЛИВ
 * [22] => ЛАВ|ОРА|КОЙ|НАД|ЕНА|ТОО|ОЧЕ|СПО|АНН|БОЛ
 * [21] => ТАВ|АЛЕ|ЬНО|ЕНЬ|ОБР|АЖЕ|СИЛ|СОВ|ВИЗ|ОГД|ДНО|БРА
 * [20] => КОВ|ЕМО|ВОЙ|ЧАС|ТАЛ|ОМН|ОТР|ДОЛ|АВИ|АЛС|ИЛО|ТАН|ГОН|ТРА|ЧАЛ|ГОЛ|РАТ
 * [19] => НАН|НЕН|НУЛ|ВАТ|ЕСК|ЯНА|ПРА|РОД|НДР|БУД|АЕТ|СЛО|ЖАЛ|ИДЕ|ИПР|МАЛ|ОСО|ВСЁ|НЕТ
 * [18] => ОБО|ИВО|АПР|САМ|РОВ|ПОК|НЕВ|ЛАН|АЯС|ИЧЕ|НАВ|НАЧ|РОМ|АВЛ|МНЕ|НОЙ|РЕМ|ОБЕ|ЕТЕ|НОЕ
 * [17] => ДЕТ|ЕОН|ОВЫ|НАМ|НАК|ЧЕН|АВА|СТЕ|ВОВ|НЫЙ|АСЬ|УМА|ДАН|ОНО|ПОТ|ВАЯ|ТНО|АНЦ|РАЖ|ИМИ
 * [16] => ЕВО|АКА|СЕБ|ИМО|ИЛС|СОБ|ОМО|ВЕС|ДАЛ|ФРА|ОТЕ|ТОП|ЬСЯ|ТСЯ|ТОЯ|НОМ|ЯЗЬ|ВОЛ|ОВН|ОСЬ
 * [15] => ИЕМ|УДА|АРА|ВОИ|ДАВ|МОГ|АОН|ТОЧ|ИРА|ЖНО|ТЕР|НИИ|МОЛ|ЕПЕ|ДАТ|МОС|УСТ|ОТВ|ТИВ|ОДЕ
 * [14] => ОДА|ЯТЬ|ХОТ|ТАШ|РИК|НЦУ|ЕБЕ|ИОН|РАФ|ДЛЯ|ГЛЯ|ИДА|ТИЛ|СПР|АСС|ЖЕЛ|ЕЩЕ|КИЙ|ОНС|АВШ
 * [13] => ЛОЖ|ЕДЕ|ЛИН|ИНИ|СЛУ|ЗАН|УВС|ССК|ОШЕ|ВЛЕ|НЕО|АМО|НЫХ|ОМИ|УЖЕ|АЛЬ|ЕРН|ВОЗ|ЕХА|ИЗН
 * [12] => РИТ|ИНУ|ПОР|МОЖ|ИЦЕ|ВРЕ|ПОН|ДОС|ИТА|РАЛ|ЕЙС|КОР|ИИЗ|НОП|АРО|ВТО|ЛЬШ|ТЕМ|АРЬ|ЕНО
 * [11] => ДИЛ|ЛАЗ|АВО|НУТ|ДЕЙ|ЕВИ|РИВ|ЛНА|ЫЛА|ВРВ|ЕРИ|НИЧ|ИЗА|ЛАГ|ШЕН|ЛЕД|КИМ|МНА|РЕЙ|ВЕТ
 * [10] => ЗАК|ЕТИ|ОЛА|НЕД|ОВР|РОШ|АКН|ООТ|НЕБ|ВИТ|ПИС|ОЛЖ|ВЫС|ДЕР|МНО|ИЗВ|ИВШ|СУД|ЕДН|ЕЗН
 * [9] => ЛАЛ|ОСУ|ВНЕ|ЗАД|ЕДС|ЕЖЕ|МЕР|КИЕ|ЛКО|ТОЖ|АСК|ЗАТ|ЕЖД|РИН|ШАЛ|ТОК|ЖЕТ|ОНЯ|ОМС|АСИ
 * [8] => ЗАС|ЗВЕ|ЛЕЕ|ЕТА|ИГО|СВЕ|ЧИТ|СОЛ|КРИ|ПЯТ|КОЕ|РЫЕ|ТИТ|КАЖ|ОЕМ|СЕГ|ЕСО|ЯПР|ЛАЕ|ОНУ
 * [7] => НУЮ|СЕР|ТИХ|ЕРТ|АЛН|КАЯ|ЯНИ|ОТС|ЕСП|СНЕ|ЖНА|ОМК|С���С|СЬН|ФИЦ|ИСА|НЯЛ|УНА|ОЕН|ИЧА
 * [6] => МЫС|ОИС|МУЖ|АКТ|ОПЯ|ЕХО|МИП|ШИХ|ИКИ|ИЦА|УЗС|КИВ|МПР|ЯМИ|ВСК|АСВ|ИЛЕ|ОЙП|СЬК|ЛЕТ
 * [5] => ТНА|ЯЗЯ|ЗГЛ|АЕГ|ПАЛ|ДТО|ВПР|ЛУШ|ЫНА|ОГА|ЬВС|БЛИ|ОШЛ|ОЙВ|ЙПР|РЯД|УЛС|ФИН|ТНЫ|НБЫ
 * [4] => ЕНС|ВЗЯ|РИД|АМЫ|ЕВР|ПОГ|АКУ|ШАЯ|ВИС|ЖИЛ|КАТ|ОЧУ|РОП|МГО|ЗДО|ЬМО|КНА|ОИН|ГРО|ОТЫ
 * [3] => ЯТА|КИП|УОН|ЙНЫ|РАГ|ЬСВ|ЛАЧ|ЕСА|ИБА|МСТ|АЯИ|ТЬМ|ОКИ|ОЕП|ОМЫ|ЛЖА|СПА|ЗАГ|ВАП|ЕРП
 * [2] => ЛДО|ЖЕР|ЕЧУ|БЛЮ|НОЗ|ЗЕМ|ЕОС|ЕЖИ|ГЛИ|ТЧА|ТКР|ОЧЬ|ИЗИ|КВА|ЯРА|ЕДП|ПЛО|ГИЕ|НОШ|ЕИН
 * [1] => ОВМ|ЖАЯ|ЯТЫ|МУЗ|УЛЬ|ЕТЧ|КИД|ЪЯС|ЗЯТ|ЫНИ|ЧКИ|РУШ|МСЛ|СОЗ|УДН|ИМГ|АДК|АЗЛ|ЙВИ|УЮП
 * [0] => ДЗА|ЙСИ|ЯЛП|ЙЦЕ|БМА|ЬВН|ЙОС|КМА|УКЛ|ХИЗ|ЕЙА|ЖАЙ|МАД|ХЛЕ|СУН|ОГП|ПИВ|ИЕУ|РВК|КЕР
 * )
 */
class ParametersGenerator extends Command
{
    private $signsAbsoluteCounts = [];
    private $nextSignsAbsoluteCounts = [];
    private $doubleChainsCounts = [];
    private $tripleChainsCounts = [];

    protected function configure()
    {
        $this->setName('language:analyze')
            ->setDescription('Analizes the given language by provided texts. Composes language information: given letters frequency, letters cains of 2 and 3 entries frequensy, next letters frequensy')
            ->addArgument('signs', InputArgument::REQUIRED, 'Letters to insert to language information')
            ->addArgument('language', InputArgument::REQUIRED, 'Language')
            ->addArgument('text-dirs', InputArgument::IS_ARRAY | InputArgument::REQUIRED, 'Directories to analyze text in.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $files = [];
        foreach ($input->getArgument('text-dirs') as $dir) {
            $files = array_merge($files, $this->getDirContents($dir));
        }
        $filesCount = count($files);
        $output->writeln("Found $filesCount files.");
        $progressBar = new ProgressBar($output, $filesCount);
        $progressBar->start();
        foreach ($files as $file) {
            $this->analyzeFile($file, preg_split('//u', mb_strtoupper($input->getArgument('signs')), null, PREG_SPLIT_NO_EMPTY));
            $progressBar->advance();
        }
        $progressBar->finish();
        $output->writeln('');
        $output->writeln('All files analyzed.');
        $output->writeln('Writing parameters file.');
        $this->writeParametersFile($input->getArgument('language'));
        $output->writeln('Done.');
    }

    private function getDirContents($dir, array &$results = [])
    {
        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path)) {
                $results[] = $path;
            } else if ($value !== '.' && $value !== '..') {
                $this->getDirContents($path, $results);
            }
        }

        return $results;
    }

    private function analyzeFile(string $file, array $signs)
    {
        $f = fopen($file, 'rb');
        while (!feof($f)) {
            $string = fgets($f);
            $string = preg_split('//u', mb_strtoupper($string), null, PREG_SPLIT_NO_EMPTY);
            $prevChar = ' ';
            $prevPrevChar = ' ';
            foreach ($string as $char) {
                if (!in_array($char, $signs, true)) {
                    continue;
                }
                if (in_array($prevChar, $signs, true)) {
                    if (!array_key_exists($prevChar, $this->nextSignsAbsoluteCounts)) {
                        $this->nextSignsAbsoluteCounts[$prevChar] = [];
                    }
                    if (!array_key_exists($char, $this->nextSignsAbsoluteCounts[$prevChar])) {
                        $this->nextSignsAbsoluteCounts[$prevChar][$char] = 0;
                    }
                    $this->nextSignsAbsoluteCounts[$prevChar][$char]++;
                }
                if (in_array($prevChar, $signs, true)) {
                    $doubleKey = $prevChar . $char;
                    if (!array_key_exists($doubleKey, $this->doubleChainsCounts)) {
                        $this->doubleChainsCounts[$doubleKey] = 0;
                    }
                    $this->doubleChainsCounts[$doubleKey]++;
                }

                if (in_array($prevPrevChar, $signs, true)) {
                    $tripleKey = $prevPrevChar . $prevChar . $char;
                    if (!array_key_exists($tripleKey, $this->tripleChainsCounts)) {
                        $this->tripleChainsCounts[$tripleKey] = 0;
                    }
                    $this->tripleChainsCounts[$tripleKey]++;
                }

                if (!array_key_exists($char, $this->signsAbsoluteCounts)) {
                    $this->signsAbsoluteCounts[$char] = 0;
                }
                $this->signsAbsoluteCounts[$char]++;
                $prevPrevChar = $prevChar;
                $prevChar = $char;
            }
        }
        fclose($f);
    }

    private function writeParametersFile(string $language)
    {
        $language = ucfirst($language);
        $fileName = getcwd() . '/src/Language/Parameters/' . $language . '.php';
        if (file_exists($fileName)) {
            unlink($fileName);
        }
        touch($fileName);
        $f = fopen($fileName, 'wb');
        if (!$f) {
            return false;
        }
        fwrite($f, "<?php
namespace KeyboardAnalytics\\Language\\Parameters;\n
use KeyboardAnalytics\\Language\\Parameters\\ParametersInterface;\n\n
class $language implements ParametersInterface {\n");
        $this->setArrayWeights($this->signsAbsoluteCounts);
        uasort($this->signsAbsoluteCounts, 'KeyboardAnalytics\Commands\ParametersGenerator::sorting');
        foreach ($this->nextSignsAbsoluteCounts as $k => $val) {
            $this->setArrayWeights($this->nextSignsAbsoluteCounts[$k]);
            uasort($this->nextSignsAbsoluteCounts[$k], 'KeyboardAnalytics\Commands\ParametersGenerator::sorting');
        }
        $this->setArrayWeights($this->doubleChainsCounts);
        uasort($this->doubleChainsCounts, 'KeyboardAnalytics\Commands\ParametersGenerator::sorting');
        $this->setArrayWeights($this->tripleChainsCounts);
        uasort($this->tripleChainsCounts, 'KeyboardAnalytics\Commands\ParametersGenerator::sorting');
        $this->writeArray($f, 'signsWeights', $this->signsAbsoluteCounts);
        $this->writeArray($f, 'nextSignsWeights', $this->nextSignsAbsoluteCounts);
        $this->writeArray($f, 'doubleChainsWeights', $this->doubleChainsCounts);
        $this->writeArray($f, 'tripleChainsWeights', $this->tripleChainsCounts);
        fwrite($f, "\tpublic function getWeight(string \$series) {
	    \$length = mb_strlen(\$series);
        if (\$length === 1 && array_key_exists(\$series, \$this->signsWeights)) {
            return \$this->signsWeights[\$series];
        }
	    if(\$length === 2 && array_key_exists(\$series, \$this->doubleChainsWeights)) {
	        return \$this->doubleChainsWeights[\$series];
        }
	    if(\$length === 3 && array_key_exists(\$series, \$this->tripleChainsWeights)) {
	        return \$this->tripleChainsWeights[\$series];
        }
        return 0;
    }

    public function getSigns(): array
    {
        return array_keys(\$this->signsWeights);
    }

    public function getDoubleSeries(): array
    {
        return array_keys(\$this->doubleChainsWeights);
    }

    public function getTripleSeries(): array
    {
        return array_keys(\$this->tripleChainsWeights);
    }
}");
        fclose($f);
    }

    private function setArrayWeights(array &$array)
    {
        $sum = array_sum($array);
        foreach ($array as $key => $value) {
            $array[$key] = $value / $sum;
        }
    }

    private function writeArray($file, string $arrayName, array $values)
    {
        fwrite($file, "\tpublic \$$arrayName = [\n");
        foreach ($values as $key => $item) {
            $this->writeArrayValue($file, $key, $item, 2);
        }
        fwrite($file, "\t];\n");
    }

    private function writeArrayValue($file, string $valueName, $value, int $shift = 1)
    {
        $shiftText = str_repeat("\t", $shift);
        fwrite($file, $shiftText);
        fwrite($file, "'$valueName' => ");
        if (is_array($value)) {
            fwrite($file, "[\n");
            foreach ($value as $key => $item) {
                $this->writeArrayValue($file, $key, $item, $shift + 1);
            }
            fwrite($file, "$shiftText]");
        } else {
            fwrite($file, $value);
        }
        fwrite($file, ",\n");
    }

    public static function sorting($a, $b)
    {
        if ($a === $b) {
            return 0;
        }
        return $a < $b ? 1 : -1;
    }
}


//$f = fopen('C:\works\furniture\english.test.txt', 'r');
//$checkOnly = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
////$checkOnly = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я'];
//$resChains = [];
//$resCounts = [];
//$doubleChains = [];
//$tripleChains = [];
//while (!feof($f)) {
//    $string = fgets($f);
//    $string = preg_split('//u', mb_strtoupper($string), null, PREG_SPLIT_NO_EMPTY);
//    $length = count($string);
//    $prevChar = ' ';
//    $prevPrevChar = ' ';
//    foreach ($string as $char) {
//        if (!in_array($char, $checkOnly, true)) {
//            continue;
//        }
//        if (!array_key_exists($prevChar, $resChains)) {
//            $resChains[$prevChar] = [];
//        }
//        if (!array_key_exists($char, $resChains[$prevChar])) {
//            $resChains[$prevChar][$char] = 0;
//        }
//        if(in_array($prevChar, $checkOnly, true)) {
//            $doubleKey = $prevChar . $char;
//            if (!array_key_exists($doubleKey, $doubleChains)) {
//                $doubleChains[$doubleKey] = 0;
//            }
//            $doubleChains[$doubleKey]++;
//        }
//
//        if (in_array($prevPrevChar, $checkOnly, true)) {
//            $tripleKey = $prevPrevChar . $prevChar . $char;
//            if (!array_key_exists($tripleKey, $tripleChains)) {
//                $tripleChains[$tripleKey] = 0;
//            }
//            $tripleChains[$tripleKey]++;
//        }
//        $resChains[$prevChar][$char]++;
//        if (!array_key_exists($char, $resCounts)) {
//            $resCounts[$char] = 0;
//        }
//        $resCounts[$char]++;
//        $prevPrevChar = $prevChar;
//        $prevChar = $char;
//    }
//}
//
//function sorting($a, $b)
//{
//    if ($a === $b) {
//        return 0;
//    }
//    return $a < $b ? 1 : -1;
//}
//
//foreach ($resChains as $i => $chain) {
//    uasort($resChains[$i], 'sorting');
//    $resChains[$i] = implode('|', array_keys($resChains[$i]));
//}
//uasort($resCounts, 'sorting');
//$res = [];
//foreach($resCounts as $k => $val) {
//    $res[$k] = $resChains[$k];
//}
//print_r($res);
//uasort($doubleChains, 'sorting');
//uasort($tripleChains, 'sorting');
//$doubleChainsRes = [];
//foreach($doubleChains as $k => $val) {
//    $doubleChainsRes[$val / 100][] = $k;
//}
//foreach($doubleChainsRes as $k => $val) {
//    $doubleChainsRes[$k] = implode('|', array_slice($val, 0, 20));
//}
//print_r($doubleChainsRes);
//$tripleChainsRes = [];
//foreach ($tripleChains as $k => $val) {
//    $tripleChainsRes[$val / 100][] = $k;
//}
//foreach ($tripleChainsRes as $k => $val) {
//    $tripleChainsRes[$k] = implode('|', array_slice($val, 0, 20));
//}
//print_r($tripleChainsRes);

