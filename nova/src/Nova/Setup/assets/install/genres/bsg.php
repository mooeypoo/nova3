<?php
/**
 * Genre Install Data (BSG)
 *
 * @package		Install
 * @category	Assets
 * @author		Anodyne Productions
 * @author		ladythorne (Anodyne forums)
 */

$g = 'bsg';

$data = array(
	'departments_'.$g 	=> 'depts',
	'ranks_info_'.$g	=> 'info',
	'ranks_groups_'.$g	=> 'groups',
	'ranks_'.$g			=> 'ranks',
	'positions_'.$g		=> 'positions',
	'catalog_ranks'		=> 'catalog_ranks',
);

$depts = array(
	array(
		'name' => 'Command',
		'desc' => "The Command Department consists of the Commander and the Executive Officer. The Commander is ultimately responsible for the safety and welfare of the entire crew. S/he has final authority on all decisions regarding the ship and her mission. The Executive officer or XO is the commander's immediate subordinate, and is also his/her successor should the need arise.",
		'order' => 0),
	array(
		'name' => 'Combat Information Center Staff',
		'desc' => "The CIC Staff consists of the FTL officers, techs and various other systems techs that keep a battlestar and her systems running smoothly.",
		'order' => 1),
	array(
		'name' => 'Viper Wing',
		'desc' => "The Viper Wing is responsible for engaging the enemy in ship to ship battles, as well as providing escort for military vessels.",
		'order' => 2),
	array(
		'name' => 'Raptor Wing',
		'desc' => "The Raptor Wing often takes on jobs of reconnaissance, rescue, scouting, and transportation.",
		'order' => 3),
	array(
		'name' => 'Hangar Deck Staff',
		'desc' => "The Hangar Deck Staff repairs Vipers and Raptors between missions.",
		'order' => 4),
	array(
		'name' => 'Medical',
		'desc' => "The medical department is responsible for the physical health of the crew, from running annual physicals to treating a wide variety of wounds and diseases.",
		'order' => 5),
	array(
		'name' => 'Engineering',
		'desc' => "The engineering department has the enormous task of keeping the ship working; they are responsible for making repairs, fixing problems, and making sure that the ship is ready for anything.",
		'order' => 6),
	array(
		'name' => 'Marine Detachment',
		'desc' => "A Marine's duties include guarding the CIC and the brig as well as other critical areas on the ship, and assisting the Master-at-Arms and are part of Raptor boarding parties. They are also responsible for stopping enemy boarding actions.",
		'order' => 7),
	array(
		'name' => 'Colonial Government',
		'desc' => "The Government of the Twelve Colonies, established by the Articles of Colonization, is a federal republic established 52 years prior to the Fall of the Twelve Colonies and is lead by a democratically elected president and legislature.",
		'order' => 8),
	array(
		'name' => 'Executive Branch',
		'desc' => "The Executive Branch of the Colonial Government is led by the President of the Twelve Colonies of Kobol who is directly elected by the population. The Executive Branch works in tandem with the Legislative Branch and the Judiciary Branch to establish, enforce and interpret laws governing the Twelve Colonies of Kobol.",
		'order' => 0,
		'parent_id' => 9),
	array(
		'name' => 'Legislative Branch',
		'desc' => "The Colonial legislature is bicameral. The upper house is the Quorum of Twelve, with each colony represented by a single delegate, each with one vote. When the vice presidency becomes vacant, the Quorum is responsible for both the nomination and confirmation of the successor to that office. The president of the Colonies is also the presiding officer of the Quorum, with the authority to break tie votes.\r\n\r\nThe lower house, The People's Council, is larger and elected on a proportional basis.",
		'order' => 1,
		'parent_id' => 9),
);

$groups = array(
	array(
		'name' => 'Colonial Navy',
		'order' => 0),
	array(
		'name' => 'Colonial Marines',
		'order' => 1),
);

$info = array(
	array(
		'name' => 'Admiral',
		'short_name' => 'ADM',
		'order' => 0,
		'group' => 1),
	array(
		'name' => 'Rear-Admiral',
		'short_name' => 'RADM',
		'order' => 1,
		'group' => 1),
	array(
		'name' => 'Commander',
		'short_name' => 'CDR',
		'order' => 2,
		'group' => 1),
	array(
		'name' => 'Colonel',
		'short_name' => 'COL',
		'order' => 3,
		'group' => 1),
	array(
		'name' => 'Lieutenant Colonel',
		'short_name' => 'LTCOL',
		'order' => 4,
		'group' => 1),
	array(
		'name' => 'Major',
		'short_name' => 'MAJ',
		'order' => 5,
		'group' => 1),
	array(
		'name' => 'Captain',
		'short_name' => 'CAPT',
		'order' => 6,
		'group' => 1),
	array(
		'name' => 'Lieutenant',
		'short_name' => 'LT',
		'order' => 7,
		'group' => 1),
	array(
		'name' => 'Lieutenant JG',
		'short_name' => 'LT(JG)',
		'order' => 8,
		'group' => 1),
	array(
		'name' => 'Ensign',
		'short_name' => 'ENS',
		'order' => 9,
		'group' => 1),
	array(
		'name' => 'Master Chief Petty Officer',
		'short_name' => 'MCPO',
		'order' => 10,
		'group' => 1),
	array(
		'name' => 'Senior Chief Petty Officer',
		'short_name' => 'SCPO',
		'order' => 11,
		'group' => 1),
	array(
		'name' => 'Chief Petty Officer',
		'short_name' => 'CPO',
		'order' => 12,
		'group' => 1),
	array(
		'name' => 'Petty Officer, 1st Class',
		'short_name' => 'PO1',
		'order' => 13,
		'group' => 1),
	array(
		'name' => 'Petty Officer, 2nd Class',
		'short_name' => 'PO2',
		'order' => 14,
		'group' => 1),
	array(
		'name' => 'Petty Officer, 3rd Class',
		'short_name' => 'PO3',
		'order' => 15,
		'group' => 1),
	array(
		'name' => 'Crewman Specialist',
		'short_name' => 'SPEC',
		'order' => 16,
		'group' => 1),
	array(
		'name' => 'Deckhand',
		'short_name' => 'DECK',
		'order' => 17,
		'group' => 1),
	array(
		'name' => 'Recruit',
		'short_name' => 'REC',
		'order' => 18,
		'group' => 1),
	array(
		'name' => '',
		'short_name' => '',
		'order' => 19,
		'group' => 1),

	array(
		'name' => 'General',
		'short_name' => 'GEN',
		'order' => 0,
		'group' => 2),
	array(
		'name' => 'Lieutenant General',
		'short_name' => 'LTGEN',
		'order' => 1,
		'group' => 2),
	array(
		'name' => 'Major General',
		'short_name' => 'MAJGEN',
		'order' => 2,
		'group' => 2),
	array(
		'name' => 'Brigadier General',
		'short_name' => 'BGEN',
		'order' => 3,
		'group' => 2),
	array(
		'name' => 'Colonel',
		'short_name' => 'COL',
		'order' => 4,
		'group' => 2),
	array(
		'name' => 'Lieutenant Colonel',
		'short_name' => 'LTCOL',
		'order' => 5,
		'group' => 2),
	array(
		'name' => 'Major',
		'short_name' => 'MAJ',
		'order' => 6,
		'group' => 2),
	array(
		'name' => 'Captain',
		'short_name' => 'CAPT',
		'order' => 7,
		'group' => 2),
	array(
		'name' => '1st Lieutenant',
		'short_name' => '1LT',
		'order' => 8,
		'group' => 2),
	array(
		'name' => '2nd Lieutenant',
		'short_name' => '2LT',
		'order' => 9,
		'group' => 2),
	array(
		'name' => 'Sergeant Major',
		'short_name' => 'SGTMAJ',
		'order' => 10,
		'group' => 2),
	array(
		'name' => 'Master Sergeant',
		'short_name' => 'MSGT',
		'order' => 11,
		'group' => 2),
	array(
		'name' => 'Gunnery Sergeant',
		'short_name' => 'GYSGT',
		'order' => 12,
		'group' => 2),
	array(
		'name' => 'Staff Sergeant',
		'short_name' => 'SSGT',
		'order' => 13,
		'group' => 2),
	array(
		'name' => 'Sergeant',
		'short_name' => 'SGT',
		'order' => 14,
		'group' => 2),
	array(
		'name' => 'Corporal',
		'short_name' => 'CPL',
		'order' => 15,
		'group' => 2),
	array(
		'name' => 'Lance Corporal',
		'short_name' => 'LCPL',
		'order' => 16,
		'group' => 2),
	array(
		'name' => 'Private, 1st Class',
		'short_name' => 'PFC',
		'order' => 17,
		'group' => 2),
	array(
		'name' => 'Private',
		'short_name' => 'PVT',
		'order' => 18,
		'group' => 2),
	array(
		'name' => '',
		'short_name' => '',
		'order' => 19,
		'group' => 2),
);

$ranks = array(
	array(
		'name' => 'Admiral',
		'short_name' => 'ADM',
		'image' => 'a4',
		'order' => 0,
		'class' => 1),
	array(
		'name' => 'Rear-Admiral',
		'short_name' => 'RADM',
		'image' => 'a3',
		'order' => 1,
		'class' => 1),
	array(
		'name' => 'Commander',
		'short_name' => 'CDR',
		'image' => 'a2',
		'order' => 2,
		'class' => 1),
	array(
		'name' => 'Colonel',
		'short_name' => 'COL',
		'image' => 'a1',
		'order' => 3,
		'class' => 1),
	array(
		'name' => 'Lieutenant Colonel',
		'short_name' => 'LTCOL',
		'image' => 'o6',
		'order' => 4,
		'class' => 1),
	array(
		'name' => 'Major',
		'short_name' => 'MAJ',
		'image' => 'o5',
		'order' => 5,
		'class' => 1),
	array(
		'name' => 'Captain',
		'short_name' => 'CAPT',
		'image' => 'o4',
		'order' => 6,
		'class' => 1),
	array(
		'name' => 'Lieutenant',
		'short_name' => 'LT',
		'image' => 'o3',
		'order' => 7,
		'class' => 1),
	array(
		'name' => 'Lieutenant JG',
		'short_name' => 'LT(JG)',
		'image' => 'o2',
		'order' => 8,
		'class' => 1),
	array(
		'name' => 'Ensign',
		'short_name' => 'ENS',
		'image' => 'o1',
		'order' => 9,
		'class' => 1),
	array(
		'name' => 'Master Chief Petty Officer',
		'short_name' => 'MCPO',
		'image' => 'e9',
		'order' => 10,
		'class' => 1),
	array(
		'name' => 'Senior Chief Petty Officer',
		'short_name' => 'SCPO',
		'image' => 'e8',
		'order' => 11,
		'class' => 1),
	array(
		'name' => 'Chief Petty Officer',
		'short_name' => 'CPO',
		'image' => 'e7',
		'order' => 12,
		'class' => 1),
	array(
		'name' => 'Petty Officer, 1st Class',
		'short_name' => 'PO1',
		'image' => 'e6',
		'order' => 13,
		'class' => 1),
	array(
		'name' => 'Petty Officer, 2nd Class',
		'short_name' => 'PO2',
		'image' => 'e5',
		'order' => 14,
		'class' => 1),
	array(
		'name' => 'Petty Officer, 3rd Class',
		'short_name' => 'PO3',
		'image' => 'e4',
		'order' => 15,
		'class' => 1),
	array(
		'name' => 'Crewman Specialist',
		'short_name' => 'SPEC',
		'image' => 'e3',
		'order' => 16,
		'class' => 1),
	array(
		'name' => 'Deckhand',
		'short_name' => 'DECK',
		'image' => 'e2',
		'order' => 17,
		'class' => 1),
	array(
		'name' => 'Recruit',
		'short_name' => 'REC',
		'image' => 'e1',
		'order' => 18,
		'class' => 1),
	array(
		'name' => '',
		'short_name' => '',
		'image' => 'blank',
		'order' => 19,
		'class' => 1),
		
	array(
		'name' => 'General',
		'short_name' => 'GEN',
		'image' => 'a4',
		'order' => 0,
		'class' => 2),
	array(
		'name' => 'Lieutenant General',
		'short_name' => 'LTGEN',
		'image' => 'a3',
		'order' => 1,
		'class' => 2),
	array(
		'name' => 'Major General',
		'short_name' => 'MAJGEN',
		'image' => 'a2',
		'order' => 2,
		'class' => 2),
	array(
		'name' => 'Brigadier General',
		'short_name' => 'BGEN',
		'image' => 'a1',
		'order' => 3,
		'class' => 2),
	array(
		'name' => 'Colonel',
		'short_name' => 'COL',
		'image' => 'o6',
		'order' => 4,
		'class' => 2),
	array(
		'name' => 'Lieutenant Colonel',
		'short_name' => 'LTCOL',
		'image' => 'o5',
		'order' => 5,
		'class' => 2),
	array(
		'name' => 'Major',
		'short_name' => 'MAJ',
		'image' => 'o4',
		'order' => 6,
		'class' => 2),
	array(
		'name' => 'Captain',
		'short_name' => 'CAPT',
		'image' => 'o3',
		'order' => 7,
		'class' => 2),
	array(
		'name' => '1st Lieutenant',
		'short_name' => '1LT',
		'image' => 'o2',
		'order' => 8,
		'class' => 2),
	array(
		'name' => '2nd Lieutenant',
		'short_name' => '2LT',
		'image' => 'o1',
		'order' => 9,
		'class' => 2),
	array(
		'name' => 'Sergeant Major',
		'short_name' => 'SGTMAJ',
		'image' => 'e9',
		'order' => 10,
		'class' => 2),
	array(
		'name' => 'Master Sergeant',
		'short_name' => 'MSGT',
		'image' => 'e8',
		'order' => 11,
		'class' => 2),
	array(
		'name' => 'Gunnery Sergeant',
		'short_name' => 'GYSGT',
		'image' => 'e7',
		'order' => 12,
		'class' => 2),
	array(
		'name' => 'Staff Sergeant',
		'short_name' => 'SSGT',
		'image' => 'e6',
		'order' => 13,
		'class' => 2),
	array(
		'name' => 'Sergeant',
		'short_name' => 'SGT',
		'image' => 'e5',
		'order' => 14,
		'class' => 2),
	array(
		'name' => 'Corporal',
		'short_name' => 'CPL',
		'image' => 'e4',
		'order' => 15,
		'class' => 2),
	array(
		'name' => 'Lance Corporal',
		'short_name' => 'LCPL',
		'image' => 'e3',
		'order' => 16,
		'class' => 2),
	array(
		'name' => 'Private, 1st Class',
		'short_name' => 'PFC',
		'image' => 'e2',
		'order' => 17,
		'class' => 2),
	array(
		'name' => 'Private',
		'short_name' => 'PVT',
		'image' => 'e1',
		'order' => 18,
		'class' => 2),
	array(
		'name' => '',
		'short_name' => '',
		'image' => 'blank',
		'order' => 19,
		'class' => 2),
);

$positions = array(
	array(
		'name' => 'Commanding Officer',
		'desc' => "Ultimately responsible for the ship and crew, the Commanding Officer is the most senior officer aboard a vessel. S/he is responsible for carrying out the orders of the President, and for representing the Colonial Fleet.",
		'dept_id' => 1,
		'order' => 0,
		'open' => 1,
		'type' => 'senior'),
	array(
		'name' => 'Executive Officer',
		'desc' => "The liaison between captain and crew, the Executive Officer acts as the disciplinarian, personnel manager, advisor to the captain, and much more. S/he is also one of only two officers, along with the Chief Medical Officer, that can remove a Commanding Officer from duty.",
		'dept_id' => 1,
		'order' => 1,
		'open' => 1,
		'type' => 'senior'),
	array(
		'name' => 'Officer of the Deck',
		'desc' => "The OOD, or Officer of the Deck monitors the CIC's operation in the absence of the ship's commanding officer. The OOD generally carries out or relays the command officer's standing orders. In the absence of a command officer, the OOD has the conn, but typically calls the commanding officer before taking any action if time allows.",
		'dept_id' => 2,
		'order' => 0,
		'open' => 1,
		'type' => 'senior'),
	array(
		'name' => 'Tactical Officer',
		'desc' => "The Tactical Officer is tasked with the monitoring of DRADIS and coordinating various command and control functionality, including computer control, the Tactical Officer must relay changes in status and keep the commander updated continuously during the fluid events of battle. The Tactical officer is typically the first to know that an attack is imminent and will address the Battlestar by the public address system to go to battle stations through Condition One or Two alerts.\r\n\r\nTactical officer must manually print or offload data from the various central computers s/he monitors (Fire control, Navigation, FTL, and mainframe computers) and relay this information to the other officers and staff in the room. Fortunately, many stations see the same information on displays similar to those at the Tactical Station, but it is the Tactical Officer who is charged with notifying the commander of the changes and interpreting the results. The Tactical Officer also is the administrator for all central computers onboard and provides maintenance as required.\r\n\r\nWhile the Helm officers drive the ship, it is the Tactical officer that plots FTL jumps, the apparently instantaneous leap from one location in space to another location millions of kilometers away. The Tactical officer not only has to provide Jump coordinates to the battlestar's helm, but also relay them if other ships are accompanying the Battlestar.",
		'dept_id' => 2,
		'order' => 1,
		'open' => 2,
		'type' => 'officer'),
	array(
		'name' => 'Communications Officer',
		'desc' => "Communications Officers monitors, directs or relays communications to and from fighters and other ships. In coordination with the Tactical Station, the Communications officer can also verify transponders that register as friendly, and alerts the Tactical Officer or commander if they pick up signals without transponders or recognized enemy transponders. The Communications Officer has a link to the mainframe computer, where a library of Colonial recognition information resides.",
		'dept_id' => 2,
		'order' => 2,
		'open' => 2,
		'type' => 'enlisted'),
	array(
		'name' => 'Helm Control Officer',
		'desc' => "Navigation is managed by spatial coordinates based on DRADIS and other sensor information. The helm crewmembers drive the battlestar through a series of controls and based on commands from the Executive officer or commanding officer.",
		'dept_id' => 2,
		'order' => 3,
		'open' => 2,
		'type' => 'officer'),
	array(
		'name' => 'Damage Control Officer',
		'desc' => "A Damage Control officer can perform many actions to repair or mitigate the effects of an enemy attack through the controls here, including the venting of compartments, coordination of damage control teams, and the like.",
		'dept_id' => 2,
		'order' => 4,
		'open' => 2,
		'type' => 'officer'),
	array(
		'name' => 'Weapons Control Officer',
		'desc' => "The Weapons Control Officer manages the battlestar's gun batteries and other defensive controls. In the event that the Weapons Control Room or CIC is knocked offline or its crew incapacitated, control of the ship's batteries can be managed at Auxiliary Fire Control.",
		'dept_id' => 2,
		'order' => 5,
		'open' => 2,
		'type' => 'officer'),
	array(
		'name' => 'Commander, Air Group',
		'desc' => "The Officer in charge of the Viper Wing aboard a battlestar. S/he conducts preflight briefings, is traditionally the lead pilot and is responsible for the Viper pilots as well as the Raptor pilots aboard the ship.",
		'dept_id' => 3,
		'order' => 0,
		'open' => 1,
		'type' => 'senior'),
	array(
		'name' => 'Squadron Leader',
		'desc' => "The Squadron Leader directs his or her lower ranking pilots in the heat of battle. The Squadron leader answers directly to the CAG.",
		'dept_id' => 3,
		'order' => 1,
		'open' => 3,
		'type' => 'officer'),
	array(
		'name' => 'Viper Pilot',
		'desc' => "Pilots are officers in the Colonial Fleet that trained and qualified to operate a Viper fighter. A Viper Pilot’s main function is to engage in military operations that have been prearranged by superior officers  and take on enemy fighters that are attempting to destroy a ship.",
		'dept_id' => 3,
		'order' => 5,
		'open' => 6,
		'type' => 'officer'),
	array(
		'name' => 'Raptor Wing Leader',
		'desc' => "The Raptor Wing Leader works directly with the CAG on future rescue and military operations that Raptors may be needed for.",
		'dept_id' => 4,
		'order' => 0,
		'open' => 1,
		'type' => 'senior'),
	array(
		'name' => 'Raptor Pilot',
		'desc' => "Raptor pilots undertake short and medium-range scans to detect electromagnetic, heat or other signatures from other vessels, scan planetary surfaces for signs of life, energy output, or to locate and assess mineral deposits, and scout ahead of its parent warship in other planetary or celestial systems for any signs of hostile intent or stellar conditions prior to the parent ship's arrival.  Raptor pilots also undertake search & rescue operations after an engagement with enemy forces.",
		'dept_id' => 4,
		'order' => 1,
		'open' => 6,
		'type' => 'officer'),
	array(
		'name' => 'Electronic Countermeasures Officer',
		'desc' => "An ECO, or Electronic Countermeasures Officer, is responsible for the electronic countermeasures on a Raptor. ECOs also operate computer equipment, including scanning and detection equipment.  ECOs are also trained to fly a Raptor in case the primary pilot is incapacitated or unavailable.",
		'dept_id' => 4,
		'order' => 5,
		'open' => 6,
		'type' => 'officer'),
	array(
		'name' => 'Chief of the Deck',
		'desc' => "The Deck Chief is responsible the overall repair and readiness of all combat spacecraft on a battlestar.",
		'dept_id' => 5,
		'order' => 0,
		'open' => 1,
		'type' => 'senior'),
	array(
		'name' => 'Landing Signal Officer',
		'desc' => "The Landing Signal Officer (LSO) is the officer who is responsible for all flight operations on the flight pods of battlestars and other military vessels. This includes the landing of all vessels, from Vipers and Raptors to small liners, as well as the operation of the launch tubes.",
		'dept_id' => 5,
		'order' => 5,
		'open' => 2,
		'type' => 'officer'),
	array(
		'name' => 'Deckhand',
		'desc' => "Deckhands are multi-faceted crewmembers on battlestars who prepare and maintain Colonial fighters and reconnaissance vehicles for flight and turnaround.",
		'dept_id' => 5,
		'order' => 10,
		'open' => 5,
		'type' => 'enlisted'),
	array(
		'name' => 'Chief Medical Officer',
		'desc' => "The Chief Medical Officer is responsible for the physical health of the entire crew, but does more than patch up injured crew members. His/her function is to ensure that they do not get sick or injured to begin with, and to this end monitors their health and conditioning with regular check ups. If necessary, the Chief Medical Officer can remove anyone from duty, even a Commanding Officer. Besides this s/he is available to provide medical advice to any individual who requests it.\r\n\r\nS/he also is a department head and a member of the Senior Staff and responsible for all the crew members in her/his department and duty rosters.",
		'dept_id' => 6,
		'order' => 0,
		'open' => 1,
		'type' => 'senior'),
	array(
		'name' => 'Medical Officer',
		'desc' => "Medical Officer undertake the majority of the work aboard the ship/facility, examining the crew, and administering medical care under the instruction of the Chief Medical Officer. Medical Officers also run the other Medical areas not directly overseen by the Chief Medical Officer.",
		'dept_id' => 6,
		'order' => 5,
		'open' => 3,
		'type' => 'officer'),
	array(
		'name' => 'Medic',
		'desc' => "S/he is responsible for providing first aid and trauma care on the battlefield.",
		'dept_id' => 6,
		'order' => 10,
		'open' => 3,
		'type' => 'enlisted'),
	array(
		'name' => 'Chief Engineering Officer',
		'desc' => "The Chief Engineer is responsible for the condition of all systems and equipment on board a battlestar or facility. S/he oversees maintenance, repairs and upgrades of all equipment. S/he is also responsible for the many repairs teams during crisis situations. The Chief Engineer is not only the department head but also a senior officer, responsible for all the crew members in her/his department and maintenance of the duty rosters.",
		'dept_id' => 7,
		'order' => 0,
		'open' => 1,
		'type' => 'senior'),
	array(
		'name' => 'Engineering Officer',
		'desc' => "There are several non-specialized engineers aboard of each vessel. They are assigned to their duties by the Chief Engineer and his Assistant, performing a number of different tasks as required, i.e. general maintenance and repair. Generally, engineers as assigned to more specialized engineering person to assist in there work is so requested by the specialized engineer.",
		'dept_id' => 7,
		'order' => 2,
		'open' => 3,
		'type' => 'officer'),
	array(
		'name' => 'Communications Specialist',
		'desc' => "This engineer maintains all the communication systems throughout the battlestar.",
		'dept_id' => 7,
		'order' => 5,
		'open' => 3,
		'type' => 'officer'),
	array(
		'name' => 'Master-At-Arms',
		'desc' => "The Master-at-Arms is a non-commissioned officer responsible for internal security aboard Colonial warships, including battlestars. ",
		'dept_id' => 8,
		'order' => 0,
		'open' => 1,
		'type' => 'senior'),
	array(
		'name' => 'Marine',
		'desc' => "The Colonial Marine Corps is a branch of the Colonial Forces tasked with ground combat operations and ship-board security.",
		'dept_id' => 8,
		'order' => 1,
		'open' => 5,
		'type' => 'enlisted'),
	array(
		'name' => 'President of the Twelve Colonies',
		'desc' => "The President of the Twelve Colonies of Kobol is directly elected by the population and is assisted by a cabinet, consisting of the heads of the various government departments.",
		'dept_id' => 10,
		'order' => 0,
		'open' => 1,
		'type' => 'senior'),
	array(
		'name' => 'Vice President of the Twelve Colonies',
		'desc' => "The Vice President of the Twelve Colonies of Kobol is the first in the line of succession after the President and works closely with the President of the Twelve Colonies to excute their agenda. In the event that the Vice Presidency is vacated during the President's term, the Quorum of Twelve is responsible for the selection and confirmation of a new Vice President.",
		'dept_id' => 10,
		'order' => 1,
		'open' => 1,
		'type' => 'senior'),
	array(
		'name' => 'Chief of Staff',
		'desc' => "The Chief of Staff in the Colonial Government is a position appointed by the President and is responsible for helping the President run the day-to-day operations of the Colonial Government.",
		'dept_id' => 10,
		'order' => 2,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Econimic Advisor',
		'desc' => "The President's Economic Advisor helps the President in all economic matters within the Colonial Government. The Economic Advisor also works closely with the Ministry of Colonial Commerce.",
		'dept_id' => 10,
		'order' => 3,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Spirtual Advisor',
		'desc' => "The President's Spirtual Advisor understands the spirtual situation across the Twelve Colonies of Kobol and helps the President in all spirtual matters, including personal spirtual advice, within the Colonial Government.",
		'dept_id' => 10,
		'order' => 4,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Scientific Advisor',
		'desc' => "The President's Scientific Advisor helps the President in all scientific matters within the Colonial Government. The Scientific Advisor also works closely with the Ministry of Science.",
		'dept_id' => 10,
		'order' => 4,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Aerilon Representative',
		'desc' => "The Aerilon representative on the Quorum of Twelve.",
		'dept_id' => 11,
		'order' => 0,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Virgon Representative',
		'desc' => "The Virgon representative on the Quorum of Twelve.",
		'dept_id' => 11,
		'order' => 1,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Caprica Representative',
		'desc' => "The Caprica representative on the Quorum of Twelve.",
		'dept_id' => 11,
		'order' => 2,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Aquarion Representative',
		'desc' => "The Aquarion representative on the Quorum of Twelve.",
		'dept_id' => 11,
		'order' => 3,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Tauron Representative',
		'desc' => "The Tauron representative on the Quorum of Twelve.",
		'dept_id' => 11,
		'order' => 4,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Libran Representative',
		'desc' => "The Libran representative on the Quorum of Twelve.",
		'dept_id' => 11,
		'order' => 5,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Picon Representative',
		'desc' => "The Picon representative on the Quorum of Twelve.",
		'dept_id' => 11,
		'order' => 6,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Gemenon Representative',
		'desc' => "The Gemenon representative on the Quorum of Twelve.",
		'dept_id' => 11,
		'order' => 7,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Scorpia Representative',
		'desc' => "The Scorpia representative on the Quorum of Twelve.",
		'dept_id' => 11,
		'order' => 8,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Leonis Representative',
		'desc' => "The Leonis representative on the Quorum of Twelve.",
		'dept_id' => 11,
		'order' => 9,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Canceron Representative',
		'desc' => "The Canceron representative on the Quorum of Twelve.",
		'dept_id' => 11,
		'order' => 10,
		'open' => 1,
		'type' => 'other'),
	array(
		'name' => 'Sagittaron Representative',
		'desc' => "The Sagittaron representative on the Quorum of Twelve.",
		'dept_id' => 11,
		'order' => 11,
		'open' => 1,
		'type' => 'other'),
);

$catalog_ranks = array(
	array(
		'name' => 'Duty Uniform',
		'location' => 'default',
		'credits' => "The Battlestar Galactica rank sets used in Nova were created by Kuro-chan of Kuro-RPG. The ranksets can be found at <a href='http://www.kuro-rpg.net' target='_blank'>Kuro-RPG</a>. Please do not copy or modify the images.",
		'default' => 1,
		'genre' => $g),
);
