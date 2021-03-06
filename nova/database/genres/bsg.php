<?php

return [

	'departments' => [
		[
			'name' => 'Command',
			'description' => "The Command Department consists of the Commander and the Executive Officer. The Commander is ultimately responsible for the safety and welfare of the entire crew. S/he has final authority on all decisions regarding the ship and her mission. The Executive officer or XO is the commander's immediate subordinate, and is also his/her successor should the need arise.",
			'order' => 0,
			'positions' => [
				[
					'name' => 'Commanding Officer',
					'description' => "Ultimately responsible for the ship and crew, the Commanding Officer is the most senior officer aboard a vessel. S/he is responsible for carrying out the orders of the President, and for representing the Colonial Fleet.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Executive Officer',
					'description' => "The liaison between captain and crew, the Executive Officer acts as the disciplinarian, personnel manager, advisor to the captain, and much more. S/he is also one of only two officers, along with the Chief Medical Officer, that can remove a Commanding Officer from duty.",
					'order' => 1,
					'available' => 1,
				],
			],
		],
		[
			'name' => 'Combat Information Center Staff',
			'description' => "The CIC Staff consists of the FTL officers, techs and various other systems techs that keep a battlestar and her systems running smoothly.",
			'order' => 1,
			'positions' => [
				[
					'name' => 'Officer of the Deck',
					'description' => "The OOD, or Officer of the Deck monitors the CIC's operation in the absence of the ship's commanding officer. The OOD generally carries out or relays the command officer's standing orders. In the absence of a command officer, the OOD has the conn, but typically calls the commanding officer before taking any action if time allows.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Tactical Officer',
					'description' => "The Tactical Officer is tasked with the monitoring of DRADIS and coordinating various command and control functionality, including computer control, the Tactical Officer must relay changes in status and keep the commander updated continuously during the fluid events of battle. The Tactical officer is typically the first to know that an attack is imminent and will address the Battlestar by the public address system to go to battle stations through Condition One or Two alerts.\r\n\r\nTactical officer must manually print or offload data from the various central computers s/he monitors (Fire control, Navigation, FTL, and mainframe computers) and relay this information to the other officers and staff in the room. Fortunately, many stations see the same information on displays similar to those at the Tactical Station, but it is the Tactical Officer who is charged with notifying the commander of the changes and interpreting the results. The Tactical Officer also is the administrator for all central computers onboard and provides maintenance as required.\r\n\r\nWhile the Helm officers drive the ship, it is the Tactical officer that plots FTL jumps, the apparently instantaneous leap from one location in space to another location millions of kilometers away. The Tactical officer not only has to provide Jump coordinates to the battlestar's helm, but also relay them if other ships are accompanying the Battlestar.",
					'order' => 1,
					'available' => 2,
				],
				[
					'name' => 'Communications Officer',
					'description' => "Communications Officers monitors, directs or relays communications to and from fighters and other ships. In coordination with the Tactical Station, the Communications officer can also verify transponders that register as friendly, and alerts the Tactical Officer or commander if they pick up signals without transponders or recognized enemy transponders. The Communications Officer has a link to the mainframe computer, where a library of Colonial recognition information resides.",
					'order' => 2,
					'available' => 2,
				],
				[
					'name' => 'Helm Control Officer',
					'description' => "Navigation is managed by spatial coordinates based on DRADIS and other sensor information. The helm crewmembers drive the battlestar through a series of controls and based on commands from the Executive officer or commanding officer.",
					'order' => 3,
					'available' => 2,
				],
				[
					'name' => 'Damage Control Officer',
					'description' => "A Damage Control officer can perform many actions to repair or mitigate the effects of an enemy attack through the controls here, including the venting of compartments, coordination of damage control teams, and the like.",
					'order' => 4,
					'available' => 2,
				],
				[
					'name' => 'Weapons Control Officer',
					'description' => "The Weapons Control Officer manages the battlestar's gun batteries and other defensive controls. In the event that the Weapons Control Room or CIC is knocked offline or its crew incapacitated, control of the ship's batteries can be managed at Auxiliary Fire Control.",
					'order' => 5,
					'available' => 2,
				],
			],
		],
		[
			'name' => 'Viper Wing',
			'description' => "The Viper Wing is responsible for engaging the enemy in ship to ship battles, as well as providing escort for military vessels.",
			'order' => 2,
			'positions' => [
				[
					'name' => 'Commander, Air Group',
					'description' => "The Officer in charge of the Viper Wing aboard a battlestar. S/he conducts preflight briefings, is traditionally the lead pilot and is responsible for the Viper pilots as well as the Raptor pilots aboard the ship.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Squadron Leader',
					'description' => "The Squadron Leader directs his or her lower ranking pilots in the heat of battle. The Squadron leader answers directly to the CAG.",
					'order' => 1,
					'available' => 3,
				],
				[
					'name' => 'Viper Pilot',
					'description' => "Pilots are officers in the Colonial Fleet that trained and qualified to operate a Viper fighter. A Viper Pilot’s main function is to engage in military operations that have been prearranged by superior officers  and take on enemy fighters that are attempting to destroy a ship.",
					'order' => 5,
					'available' => 6,
				],
			],
		],
		[
			'name' => 'Raptor Wing',
			'description' => "The Raptor Wing often takes on jobs of reconnaissance, rescue, scouting, and transportation.",
			'order' => 3,
			'positions' => [
				[
					'name' => 'Raptor Wing Leader',
					'description' => "The Raptor Wing Leader works directly with the CAG on future rescue and military operations that Raptors may be needed for.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Raptor Pilot',
					'description' => "Raptor pilots undertake short and medium-range scans to detect electromagnetic, heat or other signatures from other vessels, scan planetary surfaces for signs of life, energy output, or to locate and assess mineral deposits, and scout ahead of its parent warship in other planetary or celestial systems for any signs of hostile intent or stellar conditions prior to the parent ship's arrival.  Raptor pilots also undertake search & rescue operations after an engagement with enemy forces.",
					'order' => 1,
					'available' => 6,
				],
				[
					'name' => 'Electronic Countermeasures Officer',
					'description' => "An ECO, or Electronic Countermeasures Officer, is responsible for the electronic countermeasures on a Raptor. ECOs also operate computer equipment, including scanning and detection equipment.  ECOs are also trained to fly a Raptor in case the primary pilot is incapacitated or unavailable.",
					'order' => 5,
					'available' => 6,
				],
			],
		],
		[
			'name' => 'Hangar Deck Staff',
			'description' => "The Hangar Deck Staff repairs Vipers and Raptors between missions.",
			'order' => 4,
			'positions' => [
				[
					'name' => 'Chief of the Deck',
					'description' => "The Deck Chief is responsible the overall repair and readiness of all combat spacecraft on a battlestar.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Landing Signal Officer',
					'description' => "The Landing Signal Officer (LSO) is the officer who is responsible for all flight operations on the flight pods of battlestars and other military vessels. This includes the landing of all vessels, from Vipers and Raptors to small liners, as well as the operation of the launch tubes.",
					'order' => 5,
					'available' => 2,
				],
				[
					'name' => 'Deckhand',
					'description' => "Deckhands are multi-faceted crewmembers on battlestars who prepare and maintain Colonial fighters and reconnaissance vehicles for flight and turnaround.",
					'order' => 10,
					'available' => 5,
				],
			],
		],
		[
			'name' => 'Medical',
			'description' => "The medical department is responsible for the physical health of the crew, from running annual physicals to treating a wide variety of wounds and diseases.",
			'order' => 5,
			'positions' => [
				[
					'name' => 'Chief Medical Officer',
					'description' => "The Chief Medical Officer is responsible for the physical health of the entire crew, but does more than patch up injured crew members. His/her function is to ensure that they do not get sick or injured to begin with, and to this end monitors their health and conditioning with regular check ups. If necessary, the Chief Medical Officer can remove anyone from duty, even a Commanding Officer. Besides this s/he is available to provide medical advice to any individual who requests it.\r\n\r\nS/he also is a department head and a member of the Senior Staff and responsible for all the crew members in her/his department and duty rosters.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Medical Officer',
					'description' => "Medical Officer undertake the majority of the work aboard the ship/facility, examining the crew, and administering medical care under the instruction of the Chief Medical Officer. Medical Officers also run the other Medical areas not directly overseen by the Chief Medical Officer.",
					'order' => 5,
					'available' => 3,
				],
				[
					'name' => 'Medic',
					'description' => "S/he is responsible for providing first aid and trauma care on the battlefield.",
					'order' => 10,
					'available' => 3,
				],
			],
		],
		[
			'name' => 'Engineering',
			'description' => "The engineering department has the enormous task of keeping the ship working; they are responsible for making repairs, fixing problems, and making sure that the ship is ready for anything.",
			'order' => 6,
			'positions' => [
				[
					'name' => 'Chief Engineer',
					'description' => "The Chief Engineer is responsible for the condition of all systems and equipment on board a battlestar or facility. S/he oversees maintenance, repairs and upgrades of all equipment. S/he is also responsible for the many repairs teams during crisis situations. The Chief Engineer is not only the department head but also a senior officer, responsible for all the crew members in her/his department and maintenance of the duty rosters.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Engineering Officer',
					'description' => "There are several non-specialized engineers aboard of each vessel. They are assigned to their duties by the Chief Engineer and his Assistant, performing a number of different tasks as required, i.e. general maintenance and repair. Generally, engineers as assigned to more specialized engineering person to assist in there work is so requested by the specialized engineer.",
					'order' => 2,
					'available' => 3,
				],
				[
					'name' => 'Communications Specialist',
					'description' => "This engineer maintains all the communication systems throughout the battlestar.",
					'order' => 5,
					'available' => 3,
				],
			],
		],
		[
			'name' => 'Marine Detachment',
			'description' => "A Marine's duties include guarding the CIC and the brig as well as other critical areas on the ship, and assisting the Master-at-Arms and are part of Raptor boarding parties. They are also responsible for stopping enemy boarding actions.",
			'order' => 7,
			'positions' => [
				[
					'name' => 'Master-At-Arms',
					'description' => "The Master-at-Arms is a non-commissioned officer responsible for internal security aboard Colonial warships, including battlestars. ",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Marine',
					'description' => "The Colonial Marine Corps is a branch of the Colonial Forces tasked with ground combat operations and ship-board security.",
					'order' => 1,
					'available' => 5,
				],
			],
		],
		[
			'name' => 'Civilians',
			'description' => "Civilians fill positions that are not related to the Colonial military. Their jobs may help serve military forces in some form.",
			'order' => 8,
			'positions' => [
				[
					'name' => 'Priest',
					'description' => "Priests also preside over military funerals, without regard for the beliefs of the deceased. Priests in the Twelve Colonies are apparently not required to practice celibacy, and can be male or female.",
					'order' => 0,
					'available' => 2,
				],
			],
		],
	],

	'rankGroups' => [
		['name' => 'Flag Officers', 'order' => 0],
		['name' => 'Line Officers', 'order' => 1],
		['name' => 'Enlisted Crew', 'order' => 2],
	],

	'rankInfo' => [
		['name' => 'Admiral', 'short_name' => 'ADM', 'order' => 0],
		['name' => 'Rear Admiral', 'short_name' => 'RADM', 'order' => 1],
		['name' => 'Commander', 'short_name' => 'CMDR', 'order' => 2],
		['name' => 'Colonel', 'short_name' => 'COL', 'order' => 3],
		['name' => 'Lieutenant Colonel', 'short_name' => 'LT COL', 'order' => 4],
		['name' => 'Major', 'short_name' => 'MAJ', 'order' => 5],
		['name' => 'Captain', 'short_name' => 'CAPT', 'order' => 6],
		['name' => 'Lieutenant', 'short_name' => 'LT', 'order' => 7],
		['name' => 'Ensign', 'short_name' => 'ENS', 'order' => 8],
		['name' => 'Warrant Officer', 'short_name' => 'WO', 'order' => 9],
		['name' => 'Chief Petty Officer', 'short_name' => 'CPO', 'order' => 10],
		['name' => 'Petty Officer 1st Class', 'short_name' => 'PO1', 'order' => 11],
		['name' => 'Petty Officer 2nd Class', 'short_name' => 'PO2', 'order' => 12],
		['name' => 'Petty Officer 3rd Class', 'short_name' => 'PO3', 'order' => 13],
		['name' => 'Crewman', 'short_name' => 'CR', 'order' => 14],
		['name' => 'Deckhand', 'short_name' => 'DH', 'order' => 15],
		['name' => 'Recruit', 'short_name' => 'REC', 'order' => 16],
	],

	'ranks' => [
		['group_id' => 1, 'info_id' => 1, 'order' => 0, 'base' => 'flag.png', 'overlay' => 'a1.png'],
		['group_id' => 1, 'info_id' => 2, 'order' => 1, 'base' => 'flag.png', 'overlay' => 'w1.png'],
		['group_id' => 1, 'info_id' => 3, 'order' => 2, 'base' => 'flag.png', 'overlay' => 'o7.png'],

		['group_id' => 2, 'info_id' => 4, 'order' => 0, 'base' => 'line.png', 'overlay' => 'o6.png'],
		['group_id' => 2, 'info_id' => 5, 'order' => 1, 'base' => 'line.png', 'overlay' => 'o5.png'],
		['group_id' => 2, 'info_id' => 6, 'order' => 2, 'base' => 'line.png', 'overlay' => 'o4.png'],
		['group_id' => 2, 'info_id' => 7, 'order' => 3, 'base' => 'line.png', 'overlay' => 'o3.png'],
		['group_id' => 2, 'info_id' => 8, 'order' => 4, 'base' => 'line.png', 'overlay' => 'o2.png'],
		['group_id' => 2, 'info_id' => 9, 'order' => 5, 'base' => 'line.png', 'overlay' => 'o1.png'],

		['group_id' => 3, 'info_id' => 10, 'order' => 0, 'base' => 'nco.png', 'overlay' => 'e9.png'],
		['group_id' => 3, 'info_id' => 11, 'order' => 1, 'base' => 'nco.png', 'overlay' => 'e7.png'],
		['group_id' => 3, 'info_id' => 12, 'order' => 2, 'base' => 'nco.png', 'overlay' => 'e6.png'],
		['group_id' => 3, 'info_id' => 13, 'order' => 3, 'base' => 'nco.png', 'overlay' => 'e5.png'],
		['group_id' => 3, 'info_id' => 14, 'order' => 4, 'base' => 'nco.png', 'overlay' => 'e4.png'],
		['group_id' => 3, 'info_id' => 15, 'order' => 5, 'base' => 'nco.png', 'overlay' => 'e3.png'],
		['group_id' => 3, 'info_id' => 16, 'order' => 6, 'base' => 'nco.png', 'overlay' => 'e2.png'],
		['group_id' => 3, 'info_id' => 17, 'order' => 7, 'base' => 'nco.png', 'overlay' => 'e1.png'],
	],

];
