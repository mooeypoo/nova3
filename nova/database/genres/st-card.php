<?php

return [

	'departments' => [
		[
			'name' => 'Command',
			'description' => "All positions in this department are singular.  The Commanding Officer of the vessel is always a member of the Space Forces, unless the vessel serves as the Lead Ship of an Order, then the Commanding Officer can be a member of the Militia. Members of the Command Staff do not hold any other responsibilities on board the vessel.",
			'order' => 0,
			'positions' => [
				[
					'name' => 'Commanding Officer',
					'description' => "A stand alone position. Either an experienced Space Forces Officer or a Militia Officer with a high level of vesala.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Deputy Commanding Officer',
					'description' => "The second highest Officer on board the vessel, an experienced Officer, and does not necessarily have to be a Space Forces Officer.  Responsible for over-seeing a specific group of staff along with the ADCO.",
					'order' => 1,
					'available' => 1,
				],
				[
					'name' => 'Assistant Deputy Commanding Officer',
					'description' => "The third highest ranking/experienced officer on board the vessel.  Responsible for over-seeing a specific group of staff along with the DCO.",
					'order' => 2,
					'available' => 1,
				],
			],
		],
		[
			'name' => 'Ship Control',
			'description' => "Also known as a Helm Officer, one must always be present in operations of the vessel, and every vessel has a number of Space Control Officers to allow shift rotations. They plot courses, supervises the computers piloting, corrects any flight deviations and pilots the ship manually when needed.",
			'order' => 1,
			'positions' => [
				[
					'name' => 'Head of Ship Control',
					'description' => "The most senior Pilot and Navigator on board the vessel.  An expert in all aspects of flight control and spacial navigation.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Deputy Head of Ship Control',
					'description' => "The second most senior Pilots and Navigators on board the vessel.  An expert in all aspects of flight control and spacial navigation.",
					'order' => 1,
					'available' => 1,
				],
				[
					'name' => 'Assistant Deputy Head of Ship Control',
					'description' => "An expert in all aspects of flight control and spacial navigation.",
					'order' => 2,
					'available' => 1,
				],
				[
					'name' => 'Pilot',
					'description' => "An experienced Pilot.",
					'order' => 3,
					'available' => 4,
				],
				[
					'name' => 'Navigator',
					'description' => "An experienced Navigator.",
					'order' => 4,
					'available' => 4,
				],
			],
		],
		[
			'name' => 'Engineering & Maintenance',
			'description' => "Responsibility of ensuring that ship functions, such as the use of the lateral sensor array, do not interfere with one and another. They must prioritize resource allocations, so that the most critical activities can have every chance of success. If so required, they can curtail shipboard functions if they thinks they will interfere with the ship's current mission or routine operations. responsible for the condition of all systems and equipment on board the ship. They oversee maintenance, repairs and upgrades of all equipment. They control the output and maintain the operational status of the Warp Core. They also responsible for the many repairs teams during crisis situations.",
			'order' => 2,
			'positions' => [
				[
					'name' => 'Head of Engineering & Maintenance',
					'description' => "The most senior Engineer on board the vessel.  An expert in all aspects of vessel systems operations.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Deputy Head of Engineering & Maintenance',
					'description' => "The second most senior Engineer on board the vessel.  An expert in all aspects of vessel systems operations.",
					'order' => 1,
					'available' => 1,
				],
				[
					'name' => 'Assistant Deputy Head of Engineering & Maintenance',
					'description' => "An expert in all aspects of vessel systems operations.",
					'order' => 2,
					'available' => 1,
				],
				[
					'name' => 'Engineer',
					'description' => "An experienced Engineer.",
					'order' => 3,
					'available' => 8,
				],
			],
		],
		[
			'name' => 'Communications Control',
			'description' => "Monitors any and all transmissions aboard the ship, as well as externally. Communications Officers are experienced linguist, proficient in many different languages.",
			'order' => 3,
			'positions' => [
				[
					'name' => 'Head of Communications',
					'description' => "The most senior Linguist on board the vessel.  An expert in over 20 languages, and in all Communications equipment.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Deputy Head of Communications',
					'description' => "The second most senior Linguist on board the vessel.  An expert in over 10 languages, and in all Communications equipment.",
					'order' => 1,
					'available' => 1,
				],
				[
					'name' => 'Assistant Deputy Head of Communications',
					'description' => "An expert in over 10 languages and Communications equipment.",
					'order' => 2,
					'available' => 1,
				],
				[
					'name' => 'Communications Officer',
					'description' => "An experienced linguist with knowledge in Communications equipment.",
					'order' => 3,
					'available' => 8,
				],
			],
		],
		[
			'name' => 'Warfare',
			'description' => "They are the vessels gunman and security. They responsible for the ships weapon system, and is also the COs tactical advisor in Star Ship Combat matters. Very often Warfare Officers are also trained in ground combat and small unit tactics. There is much more to Warfare than simply overseeing the weapons console on the bridge. Warfare maintains the weapons systems aboard the ship, maintaining and reloading photons magazines. Tactical planning and current Intelligence analysis (if no Intelligence operatives are aboard) and manning all secure areas of the vessel.",
			'order' => 4,
			'positions' => [
				[
					'name' => 'Head of Warfare',
					'description' => "The most seasoned and experienced weapons and tactical expert aboard the vessel, as well as stratetician, who ensures the safety of the vessel from external forces via usage of weapons.  Also maintains all weapons on board the vessel.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Deputy Head of Warfare',
					'description' => "A seasoned and experienced weapons and tactical expert, as well as stratetician, who ensures the safety of the vessel from external forces via usage of weapons.  Also maintains all weapons on board the vessel.",
					'order' => 1,
					'available' => 1,
				],
				[
					'name' => 'Assistant Deputy Head of Warfare',
					'description' => "An experienced weapons and tactical expert, as well as stratetician, who ensures the safety of the vessel from external forces via usage of weapons.  Also maintains all weapons on board the vessel.",
					'order' => 2,
					'available' => 1,
				],
				[
					'name' => 'Warfare Officer',
					'description' => "An experienced weapons and tactical officer.",
					'order' => 3,
					'available' => 8,
				],
			],
		],
		[
			'name' => 'Militia Infantry',
			'description' => "It is their duty is to ensure the safety of ship and crew. The Infantry Commander takes it as their personal duty to protect the Commanding Officer on landing parties. They are also responsible for people under arrest and the safety of guests, liked or not. They are also required to take command of any special ground operations.",
			'order' => 5,
			'positions' => [
				[
					'name' => 'Infantry Commander',
					'description' => "The Infantry Commander is responsible for the infantry forces on the ship/base. They oversee any and all matters related to their units, including tactical strategy in concert with the Commanding Officer. Works with other members of his/her team to ensure the infantry forces are ready to be deployed at a moment's notice. Reports to the Commanding Officer.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Infantry Second-in-Command',
					'description' => "Responsible for overseeing the infantry forces on a ship/base. Works in tandem with the Infantry Commander to ensure their forces are ready to deployed at a moment's notice. Reports to the Infantry Commander.",
					'order' => 1,
					'available' => 1,
				],
				[
					'name' => 'Infantry Third-in-Command',
					'description' => "Responsible for overseeing the enlisted division of a ship/base's infantry complement. Reports to the Infantry Commander.",
					'order' => 2,
					'available' => 1,
				],
				[
					'name' => 'Infantry Soldier',
					'description' => "The lifeblood of the Infantry, soldiers make up the units stationed on ships and bases. Reports to the Infantry Commander.",
					'order' => 3,
					'available' => 20,
				],
			],
		],
		[
			'name' => 'Science Staff',
			'description' => "Responsible for all the scientific data the vessel collects, and the distribution of such data to specific section amongst the staff for study. Scientists are seen with something bordering on contempt within the Cardassian Union, and are seen by the Central Command to serve one purpose; for the benefit of the military.  Members of the Science Staff are not technically members of either the Space Forces or the Militia, but are part of the Military but rather the Military Sciencetific Order, and are seen as seconded to a particular Order/Vessel.  Due to the specialist nature of the department, everyone within the Sciences has carried out their required Military Service, and has elected to continue within the Military and specialized in sciences.  Due to the gender biased within the Cardassian Union, the majority of Scientists appear to be female.",
			'order' => 6,
			'positions' => [
				[
					'name' => 'Head of Sciences',
					'description' => "The most senior Scientist on board the vessel.  An expert in several specialist fields of scientific research.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Deputy Head of Sciences',
					'description' => "The second most senior Scientist on board the vessel.  Primarily deals with the day to day running of the Department, allowing the Head of Sciences to carry out their research projects.",
					'order' => 1,
					'available' => 1,
				],
				[
					'name' => 'Assistant Deputy Head of Sciences',
					'description' => "The third most senior Scientist on board the vessel.  Usually an expert in on specialist field of study, but also an experienced generalist to be able to deal and understand all information they gather.",
					'order' => 2,
					'available' => 1,
				],
				[
					'name' => 'Scientist',
					'description' => "A Generalist Scientist on board the vessel. They are not yet considered to be an expert in any one particular field of scientific research, but considered well versed in the many fields of scientific research to carry out solo study.",
					'order' => 3,
					'available' => 5,
				],
			],
		],
		[
			'name' => 'Medical Staff',
			'description' => "Responsible for the physical health of the entire crew, but does more than patch up injured crew members. Their function is to ensure that they do not get sick or injured to begin with, and to this end monitors their health and conditioning with regular check ups. Unlike a Starfleet vessel a Cardassian Doctor cannot relieve the vessel's Commander of duty. Besides this they available to provide medical advice to any individual who requests it. As with the Sciences, the Medical Staff are not members of the Space Forces or Militia, but rather are members of the Military Medical Order and are seen as on seconded duty with the particular Order of the vessel on which they serve.",
			'order' => 7,
			'positions' => [
				[
					'name' => 'Head of Medicine & Surgery',
					'description' => "The most Senior Doctor on board the vessel, considered to be an expert in the both Medicine and Surgery.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Deputy Head of Medicine & Surgery',
					'description' => "The second most senior Doctor on the vessel.  Experienced in both Medicine and Surgery.",
					'order' => 1,
					'available' => 1,
				],
				[
					'name' => 'Assistant Deputy Head of Medicine & Surgery',
					'description' => "The third most senior Doctor on the vessel.  Experienced in both Medicine and Surgery.",
					'order' => 2,
					'available' => 1,
				],
				[
					'name' => 'Doctor',
					'description' => "An experienced doctor with expertise in either Medicine or Surgery. In most cases, unlike the senior officers, they will not be experienced in all medical matters.",
					'order' => 3,
					'available' => 4,
				],
				[
					'name' => 'Medical Orderly',
					'description' => "They carry out the roles of Nurses and assistants to the Doctors.",
					'order' => 4,
					'available' => 8,
				],
			],
		],
		[
			'name' => 'Political Staff',
			'description' => "This department is of an oddity of the Cardassian Union.  The entire purpose of this department is to ensure that the vessel and her crew follow the will of the Central Command at all times.  Duty to the state is something that is programmed into the Cardassian psyche, and the Political Staff ensure they follow this programming.  As with the Sciences and Medical Staff members of the Political Staff are neither Space Force nor Militia Officers, but rather are directly answerable to the Central Command. In situations of First Contact or meetings with Alien species, a Political Officer can supersede the vessel's Commanding Officer is s/he believes that the Commanding Officer is not doing what is best for the Union or the Central Command. They are seen as a nasty necessity to life serving the Union.",
			'order' => 8,
			'positions' => [
				[
					'name' => 'Political Officer',
					'description' => "The eyes and ears of the Central Command and Detapa Council on board the vessel, generally it is assumed all Political Officers also serve the Obsidian Order.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Political Aide',
					'description' => "The eyes and ears of the Central Command and Detapa Council on board the vessel that work with the Political Officer. Generally, it is assumed all Political Aides also serve the Obsidian Order.",
					'order' => 1,
					'available' => 1,
				],
			],
		],
		[
			'name' => '5th Order',
			'description' => "The Fifth Order, also known as the 'Jade Order' (Cairhail Terapha), comprises the Central Command's military intelligence division. Central Command maintains the Fifth Order so it does not have to depend entirely on the Obsidian Order for military intelligence. The Jade Order is far smaller than the Obsidian Order, and has a fierce rivalry with its larger 'civilian' competitor. As with the above departments, the Officers of the Jade Order are not considered Space Forces or Militia, but are rather on seconded duty to the particular order of the vessel on which they serve.",
			'order' => 9,
			'positions' => [
				[
					'name' => 'Head Jade Officer',
					'description' => "Ensures all intelligence the vessel gathers is relayed to Central Command, as well as all pertinent information from the Jade Order and Central Command is given to the Commanding Officer.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Deputy Head Jade Officer',
					'description' => "Ensures all intelligence the vessel gathers is relayed to Central Command, as well as all pertinent information from the Jade Order and Central Command is given to the Commanding Officer. Reports to the Head Jade Officer.",
					'order' => 1,
					'available' => 1,
				],
			],
		],
		[
			'name' => 'Logistics',
			'description' => "The Logistics department keeps track of all matters coming in and off the vessel, also when carrying out private freight the Logistics Officer along with the Commanding Officer takes a percentage of any profit for doing so.",
			'order' => 10,
			'positions' => [
				[
					'name' => 'Head of Logistics',
					'description' => "The Head of Logistics is responsible for keeping track of all matters coming in and off the vessel. A nuanced position, the Head of Logistics also coordinates carrying out private freight, a task which they take a percentage of profits (along with the Commanding Officer) for doing so.",
					'order' => 0,
					'available' => 1,
				],
				[
					'name' => 'Deputy Head of Logistics',
					'description' => "The Deputy Head of Logistics is responsible for helping to keep track of all matters coming in and off the vessel. Reports to the Head of Logistics.",
					'order' => 1,
					'available' => 1,
				],
				[
					'name' => 'Assistant Deputy Head of Logistics',
					'description' => "Assists the Deputy Head of Logistics for tracking all matters coming in and off the vessel.",
					'order' => 2,
					'available' => 1,
				],
				[
					'name' => 'Logistics Officer',
					'description' => "Tracks all matters coming in and off the vessel along with the other members of the Logistics department.",
					'order' => 3,
					'available' => 8,
				],
			],
		],
	],

	'rankGroups' => [
		['name' => 'Central Command', 'order' => 0],
		['name' => 'Cardassian Defense Force', 'order' => 1],
	],

	'rankInfo' => [
		['name' => 'Legate (3rd Order)', 'short_name' => 'LEG', 'order' => 0],
		['name' => 'Legate (2nd Order)', 'short_name' => 'LEG', 'order' => 1],
		['name' => 'Legate (1st Order)', 'short_name' => 'LEG', 'order' => 2],
		['name' => 'Jagul', 'short_name' => 'JAG', 'order' => 3],
		['name' => 'Gul', 'short_name' => 'GUL', 'order' => 4],
		['name' => 'Dal', 'short_name' => 'DAL', 'order' => 5],
		['name' => 'Dalin', 'short_name' => 'DLN', 'order' => 6],
		['name' => 'Glinn', 'short_name' => 'GLN', 'order' => 7],
		['name' => 'Gil', 'short_name' => 'GIL', 'order' => 8],
		['name' => 'Kel', 'short_name' => 'KEL', 'order' => 8],
		['name' => 'Garresh', 'short_name' => 'GRS', 'order' => 9],
		['name' => 'Gorr', 'short_name' => 'GOR', 'order' => 10],
	],

	'ranks' => [
		['group_id' => 1, 'order' => 0, 'info_id' => 1, 'base' => 'card1.png', 'overlay' => 'a4.png'],
		['group_id' => 1, 'order' => 1, 'info_id' => 2, 'base' => 'card1.png', 'overlay' => 'a3.png'],
		['group_id' => 1, 'order' => 2, 'info_id' => 3, 'base' => 'card1.png', 'overlay' => 'a2.png'],
		['group_id' => 1, 'order' => 3, 'info_id' => 4, 'base' => 'card1.png', 'overlay' => 'a1.png'],
		
		['group_id' => 2, 'order' => 0, 'info_id' => 5, 'base' => 'card1.png', 'overlay' => 'o6.png'],
		['group_id' => 2, 'order' => 1, 'info_id' => 6, 'base' => 'card1.png', 'overlay' => 'o5.png'],
		['group_id' => 2, 'order' => 2, 'info_id' => 7, 'base' => 'card1.png', 'overlay' => 'o4.png'],
		['group_id' => 2, 'order' => 3, 'info_id' => 8, 'base' => 'card1.png', 'overlay' => 'o3.png'],
		['group_id' => 2, 'order' => 4, 'info_id' => 9, 'base' => 'card1.png', 'overlay' => 'o2.png'],
		['group_id' => 2, 'order' => 5, 'info_id' => 10, 'base' => 'card1.png', 'overlay' => 'o1.png'],
		['group_id' => 2, 'order' => 6, 'info_id' => 11, 'base' => 'card2.png', 'overlay' => 'e2.png'],
		['group_id' => 2, 'order' => 7, 'info_id' => 12, 'base' => 'card2.png', 'overlay' => 'e1.png'],
	],

];
