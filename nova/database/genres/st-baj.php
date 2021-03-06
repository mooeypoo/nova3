<?php

return [

	'departments' => [
		[
			'name' => 'Command',
			'description' => "The Command division of the Bajoran Militia is made up of experienced officers that are responsible for carrying out the orders of the Bajoran Provisional Government and the Bajoran Militia. Members of the Command division have undergone training at the Bajoran Military Academy's Command School before accepting positions in the fleet.",
			'order' => 0,
		],
		[
			'name' => 'Aerial Operations',
			'description' => "The Aerial Operations division is comprised of pilots of both large vessels as well as single-seat fighters and atmospheric vessels. The Aerial Operations division is responsible for the safe navigation of all vessels in the Bajoran Militia including operation of Aerial Guard Fighter Detachments.",
			'order' => 1,
		],
		[
			'name' => 'Operations',
			'description' => "The Operations division is responsible for keeping systems functioning properly, rerouting power, bypassing relays and doing whatever else is necessary to keep the systems operating at peak efficiency. Most Operations graduates of the Bajoran Military Academy are also highly skilled in engineering skills as well.",
			'order' => 2,
		],
		[
			'name' => 'Engineering',
			'description' => "The Engineering division has the enormous task of keeping the vessel working; they are responsible for making repairs, fixing problems and ensuring the vessel is ready for anything. In addition to maintaining the larger vessels, the Engineering division also works closely with the Aerial Guard to maintain the Aerial Guard Fighter Detachments as well.",
			'order' => 3,
		],
		[
			'name' => 'Security',
			'description' => "Comprised of veterans of the Cardassian Occupation and Dominion War, the Security & Tactical division of the Bajoran Militia is responsible for the safety of the personnel aboard a ship or base as well as the tactical planning, preparation, maintenance and execution of tactical tasks.",
			'order' => 4,
		],
		[
			'name' => 'Medical',
			'description' => "The healers of the Bajoran Militia, the Medical division on a ship or base are among some of the best trained medical personnel in the quadrant. After completing required coursework at the Bajoran Military Academy, medical students spend great amounts of time at several of Bajor's premier medical facilities before accepting positions in the Militia.",
			'order' => 5,
		],
		[
			'name' => 'Science',
			'description' => "Over the years, Bajoran scientists have been at the forefront of many significant scientific breakthroughs. Though they have to attend the Bajoran Military Academy to gain a commission in the Bajoran Militia, many Militia scientists spend time on Earth and Vulcan working with their Federation counterparts before taking posts in the Militia.",
			'order' => 6,
		],
	],

	'positions' => [
		[
			'name' => 'Commanding Officer',
			'description' => "The Commanding Officer is the seniormost Militia officer aboard the vessel and is in charge of everything that happens on the vessel. The Commanding Officer is responsible for executing the orders from the Provisional Government and Militia leaders.",
			'department_id' => 1,
			'order' => 0,
			'available' => 1,
		],
		[
			'name' => 'First Officer',
			'description' => "The First Officer is the second seniormost Militia officer aboard the vessel and assists the Commanding Officer in their duties including management of all officers and enlisted personnel aboard the vessel. In the event the Commanding Officer is unable to do their duties, the First Officer assumes their role.",
			'department_id' => 1,
			'order' => 1,
			'available' => 1,
		],
			
		[
			'name' => 'First Pilot',
			'description' => "The First Pilot is the seniormost Aerial Operations officer aboard the vessel. The First Pilot is responsible for the safe navigation and piloting of the vessel as well as any non-Militia auxiliary craft such as shuttlepods, shuttlecraft and impulse vessels that may be assigned to the vessel.",
			'department_id' => 2,
			'order' => 0,
			'available' => 1,
		],
		[
			'name' => 'Second Pilot',
			'description' => "The Second Pilot is a senior Aerial Operations officer aboard the vessel and is responsible for assisting the First Pilot with their duties. Often, the Second Pilot will be the primary pilot of auxiliary craft and helps training the other pilots aboard the vessel.",
			'department_id' => 2,
			'order' => 1,
			'available' => 1,
		],
		[
			'name' => 'Pilot',
			'description' => "The pilot is a member of the Aerial Operations division and is responsible for aiding the First and Second Pilots in navigating and piloting the vessel as well as auxiliary craft.",
			'department_id' => 2,
			'order' => 2,
			'available' => 5,
		],
			
		[
			'name' => 'First Operations Officer',
			'description' => "The First Operations Officer is the seniormost Operations officer aboard the vessel and is responsible for maintaining the vessel on a day-to-day basis including anything that maintains the smooth operation of the vessel. Because of the close ties to the Engineering division, most First Operations Officers also spend some of their time working with the Engineering division.",
			'department_id' => 3,
			'order' => 0,
			'available' => 1,
		],
		[
			'name' => 'Second Operations Officer',
			'description' => "The Second Operations Officer is a senior Operations officer aboard the vessel and is responsible for assisting the First Operations Officer in their duties. Part of qualifications for becoming a First Operations Officer includes engineering qualifications overseen by the First Operations Officer and the Chief Engineer.",
			'department_id' => 3,
			'order' => 1,
			'available' => 1,
		],
		[
			'name' => 'Operations Officer',
			'description' => "The Operations Officer is responsible for maintaining the smooth operation of the vessel at the orders of the First Operations Officer. Operations Officers report to the First Operations Officer.",
			'department_id' => 3,
			'order' => 2,
			'available' => 5,
		],
		[
			'name' => 'Quartermaster',
			'description' => "The Quartermaster specializes in distributing supplies and provisions to personnel aboard the vessel. In addition, the Quartermaster controls all physical assignments to quarters throughout the vessel.",
			'department_id' => 3,
			'order' => 3,
			'available' => 1,
		],
		[
			'name' => 'Boatswain',
			'description' => "Each vessel and base has one enlisted officer who holds the position of Boatswain. The Boatswain (pronounced and also written 'Bosun') trains and supervises personnel (including both the ship's company or base personnel as well as passengers or vessels) in general ship and base operations, repairs, and protocols; maintains duty assignments for all Operations personnel; sets the agenda for instruction in general ship and base operations; supervises auxiliary and utility service personnel and daily ship or base maintenance; coordinates all personnel cross-trained in damage control operations and supervises damage control and emergency operations; may assume any Bridge or Operations role as required; and is qualified to temporarily act at Operations if so ordered.\r\n\r\nThe Boatswain reports to the First Operations Officer.",
			'department_id' => 3,
			'order' => 4,
			'available' => 1,
		],
			
		[
			'name' => 'Chief Engineer',
			'description' => "The Chief Engineer is responsible for the condition of all systems and equipment aboard the vessel and oversees maintenance, repairs and upgrades of all equipment. During crisis situations, the Chief Engineer is also responsible for the any repair teams.\r\n\r\nThe Chief Engineer is not only the division head but also a senior officer, responsible for all the crew members in her/his division and maintenance of the duty rosters.",
			'department_id' => 4,
			'order' => 0,
			'available' => 1,
		],
		[
			'name' => 'Second Engineer',
			'description' => "The Second Engineer assists the Chief Engineer in the daily work; in issues regarding mechanical, administrative matters and coordinating repairs with other departments.\r\n\r\nIf so required, the Second Engineer must be able to take over as Chief Engineer and must be versed in current information regarding the ship or facility.",
			'department_id' => 4,
			'order' => 1,
			'available' => 1,
		],
		[
			'name' => 'Engineer',
			'description' => "Engineers are at the core of the Bajoran Corps of Engineers and are responsible for, under the guidance of the Chief Engineer, maintaining and repairing the vessel.",
			'department_id' => 4,
			'order' => 2,
			'available' => 10,
		],
		[
			'name' => 'Aerial Operations Specialist',
			'description' => "The Aerial Operations Specialist is a specially trained enlisted personnel who works closed with Aerial Guard units on the repair and maintenance of shuttlepods, shuttlecraft, impulse vessels and fighters. The Aerial Operations Specialist reports to the Chief Engineer.",
			'department_id' => 4,
			'order' => 3,
			'available' => 5,
		],
		[
			'name' => 'Communications Specialist',
			'description' => "The Communications Specialist is a specialized engineer. Communication aboard a ship or facility takes two basic forms, voice and data. Both are handled by the onboard computer system and dedicated hardware. The vastness and complexity of this system requires a dedicated team to maintain the system.\r\n\r\nThe Communications Specialist is the person in charge of this team, which is made up from enlisted personnel, assigned to the team by the First and Chief Engineer.",
			'department_id' => 4,
			'order' => 4,
			'available' => 1,
		],
		[
			'name' => 'Computer Systems Specialist',
			'description' => "The Computer Systems Specialist is a specialized Engineer. The new generation of Computer systems are highly developed. This system needs much maintenance and the Computer Systems Specialist was introduced to relieve the Science Officer, whose duty this was in the very early days.\r\n\r\nA small team is assigned to the Computer Systems Specialist, which is made up from enlisted personnel assigned by the First and Chief Engineer.",
			'department_id' => 4,
			'order' => 5,
			'available' => 1,
		],
		[
			'name' => 'Damage Control Specialist',
			'description' => "The Damage Control Specialist is a specialized Engineer. The Damage Control Specialist controls all damage control aboard the ship when it gets damaged in battle. S/he oversees all damage repair aboard the ship, and coordinates repair teams on the smaller jobs so the Chief Engineer can worry about other matters.\r\n\r\nA small team is assigned to the Damage Control Specialist which is made up from NCO personnel assigned by the Assistant and Chief Engineer. The Damage Control Specialist reports to the Assistant and Chief Engineer.",
			'department_id' => 4,
			'order' => 6,
			'available' => 1,
		],
		[
			'name' => 'Matter/Energy Systems Specialist',
			'description' => "The Matter/Energy Systems Specialist is a specialized Engineer. All aspect of matter energy transfers with the sole exception of the warp drive systems are handled by the Matter/Energy Systems Specialist. Such areas involved are transporter and replicator systems. The Matter/Energy Systems Specialist is the officer in charge of a small team, which is made up of enlisted personnel, assigned by the First and Chief Engineer.",
			'department_id' => 4,
			'order' => 7,
			'available' => 1,
		],
		[
			'name' => 'Propulsion Specialist',
			'description' => "Specializing in impulse and warp propulsion, these engineers specialize in the complexities of warp and impulse systems and can sometimes even specialize in specific classes of vessels.",
			'department_id' => 4,
			'order' => 8,
			'available' => 1,
		],
		[
			'name' => 'Structural/Environmental Specialist',
			'description' => "The Structural and Environmental Systems Specialist is a specialized Engineer. From a small ship/facility to a large one, all requires constant monitoring. The hull, bulkheads, walls, lifts, structural integrity field, internal dampening field and environmental systems are all monitored and maintained by this officer and his/her team.\r\n\r\nThe team assigned to the Structural and Environmental Systems Specialist is made up of enlisted personnel assigned by the First and Chief Engineer.",
			'department_id' => 4,
			'order' => 9,
			'available' => 1,
		],
			
		[
			'name' => 'Chief of Security',
			'description' => "The Chief of Security is responsible for ensuring the safety of the ship, base or vessel and its crew. The Chief of Security has the authority from the Bajoran Militia to detain anyone in violation of the rules and regulations set down by the Militia. In addition to security, the Chief of Security also oversees any tactical units aboard the ship, base or vessel.",
			'department_id' => 5,
			'order' => 0,
			'available' => 1,
		],
		[
			'name' => 'Second Security Officer',
			'description' => "The Second Security Officer is the seniormost security deputy responsible for assisting the Chief of Security in their duties. Often the Second Security Officer is also one of the seniormost tactical officers as well. In the event the Chief of Security can't complete their duties, the Second Security Officer acts in their capacity.",
			'department_id' => 5,
			'order' => 1,
			'available' => 1,
		],
		[
			'name' => 'Security Deputy',
			'description' => "Security Deputies are the officers and enlisted personnel who make up the bulk of the Security division and act as a police force on the ship, base or vessel. While Security Deputies have gone through the Bajoran Military Academy, many of the deputies were previously members of City Watch, the police force whose jurisdiction includes the provinces of Bajor.",
			'department_id' => 5,
			'order' => 2,
			'available' => 10,
		],
		[
			'name' => 'First Tactical Officer',
			'description' => "The First Tactical Officer is usually one of the more senior Tactical Officers on the vessel. Tactical Officers on Bajoran vessels are responsible for running and maintaining the numerous weapons systems aboard the ship, base or vessel. In addition, Tactical Officers offer analysis and tactical planning for current missions. Very often Tactical Officers are also trained in ground combat and small unit tactics.",
			'department_id' => 5,
			'order' => 3,
			'available' => 1,
		],
		[
			'name' => 'Tactical Officer',
			'description' => "Tactical Officers on Bajoran vessels are responsible for running and maintaining the numerous weapons systems aboard the ship, base or vessel. In addition, Tactical Officers offer analysis and tactical planning for current missions. Very often Tactical Officers are also trained in ground combat and small unit tactics.",
			'department_id' => 5,
			'order' => 4,
			'available' => 5,
		],
		[
			'name' => 'Security Investigations Officer',
			'description' => "Bajoran Security Investigations Officers can be either officers or enlisted officers with the role of a special investigator or detective when dealing with matters aboard ship, base, vessel or even a planet. The Security Investigations Officer coordinates with the Chief of Security Officer on all investigations as needed.",
			'department_id' => 5,
			'order' => 5,
			'available' => 5,
		],
			
		[
			'name' => 'Chief Physician',
			'description' => "The Chief Physician is the seniormost Medical division officer on the ship, base or vessel. Bajoran medical officers are none to be some of the best in the galaxy and Chief Physicians are at the top of those lists. Despite their military training in order to be in the Militia, most Chief Physicians spend great deals of time at many of Bajor's premier medical facilities and engage in medical research whenever possible.",
			'department_id' => 6,
			'order' => 0,
			'available' => 1,
		],
		[
			'name' => 'Second Physician',
			'description' => "The Second Physician is the second most senior Medical division officer on the ship, base or vessel. The Second Physician is responsible for assisting the Chief Physician and often oversees the nursing staff much in the way a First Officer would help the Commanding Officer manage the crew. Bajoran medical officers are none to be some of the best in the galaxy and Chief Physicians are at the top of those lists. Despite their military training in order to be in the Militia, most Chief Physicians spend great deals of time at many of Bajor's premier medical facilities and engage in medical research whenever possible.",
			'department_id' => 6,
			'order' => 1,
			'available' => 1,
		],
		[
			'name' => 'Physician',
			'description' => "Bajoran medical officers are none to be some of the best in the galaxy and Chief Physicians are at the top of those lists. Despite their military training in order to be in the Militia, most Chief Physicians spend great deals of time at many of Bajor's premier medical facilities and engage in medical research whenever possible.",
			'department_id' => 6,
			'order' => 2,
			'available' => 5,
		],
		[
			'name' => 'Surgeon',
			'description' => "One area where Bajoran medicine excels is surgery. Most ships, bases and vessels keep at least one surgeon on hand. Sometimes, the surgeon is also the Chief Physician, but on larger vessels and bases, surgeon is a dedicated position. The surgeon is responsible for all surgeries that need to happen with the crew or on any type of relief mission.",
			'department_id' => 6,
			'order' => 3,
			'available' => 1,
		],
		[
			'name' => 'Counselor',
			'description' => "Because of their training in psychology, Bajoran Counselors are considered part of the Medical division. The Counselor is responsible both for advising the Commanding Officer in dealing with other people and races and in helping crew members with personal, psychological, and emotional problems.",
			'department_id' => 6,
			'order' => 4,
			'available' => 1,
		],
		[
			'name' => 'Head Nurse',
			'description' => "The Head Nurse oversees all the Nurses aboard a ship, base or vessel and ensures they are assigned to tasks and working as required in their area. Additionally the Head nurse performs the normal duties of the nurse, assisting the Duty Physician in the infirmary.",
			'department_id' => 6,
			'order' => 5,
			'available' => 1,
		],
		[
			'name' => 'Nurse',
			'description' => "Nurses are trained in basic medical care and are capable of dealing with less serious medical cases. In more serious matters the nurse assists the Chief Physician in the examination and administration of medical care, be this injecting required drugs, or simply assuring the injured party that they will be okay. The Nurses also maintain the medical wards, overseeing the patients and ensuring they are receiving medication and care as instructed by the Chief Physician.",
			'department_id' => 6,
			'order' => 6,
			'available' => 10,
		],
			
		[
			'name' => 'First Science Officer',
			'description' => "The First Science Officer is the seniormost Science division officer aboard the ship, base or vessel and is responsible for all the scientific data the ship, base or vessel collects and the distribution of the data to specific sections within the division for analysis.",
			'department_id' => 7,
			'order' => 0,
			'available' => 1,
		],
		[
			'name' => 'Second Science Officer',
			'description' => "The Second Science Officer is the second most senior Science division officer aboard the ship, base or vessel and is responsible for assisting the First Science Officer with all the scientific data the ship, base or vessel collects and the distribution of the data to specific sections within the division for analysis.",
			'department_id' => 7,
			'order' => 1,
			'available' => 1,
		],
		[
			'name' => 'Science Officer',
			'description' => "There are several general Science Officers aboard each vessel and are assigned to their duties by the First Science Officer. Assignments can include work for the specialized section heads, as well as duties for work being carried out by the First and Second Science Officers.",
			'department_id' => 7,
			'order' => 2,
			'available' => 5,
		],
		[
			'name' => 'Astrometrics Officer',
			'description' => "Specialized Science Officer in charge of the Astrometrics Section. This role entails the maintaining, correction and production of new stellar maps. Has close ties with the the Stellar Cartographers.",
			'department_id' => 7,
			'order' => 3,
			'available' => 2,
		],
		[
			'name' => 'Alien Archaeologist/Anthropologist',
			'description' => "Specialized Science Officer in charge of the Alien Culture Section. This role involves the study of all newly discovered alien species and life forms, from the long dead to thriving. Their knowledge also involves current known alien species.",
			'department_id' => 7,
			'order' => 4,
			'available' => 1,
		],
		[
			'name' => 'Biologist',
			'description' => "Specialized Science Officer in charge of the Biology Section. This role entails the study of biology, botany, zoology and many more Life Sciences. On larger ships there many be a number of Science Officers within this section under the lead of the Biologist.",
			'department_id' => 7,
			'order' => 5,
			'available' => 1,
		],
		[
			'name' => 'Language Specialist',
			'description' => "Specialized Communications Officer in charge of the Linguistics section. This role involves the study of new and old languages and text in an attempt to better understand and interpret their meaning.",
			'department_id' => 7,
			'order' => 6,
			'available' => 1,
		],
		[
			'name' => 'Stellar Cartographer',
			'description' => "Specialized Science Officer in charge of the Stellar Cartography bay. This role entails the mapping of all spatial phenomenon, and the implications of such phenomenon. Has close ties with the Astrometrics Officer.",
			'department_id' => 7,
			'order' => 7,
			'available' => 1,
		],
			
		[
			'name' => 'Group Commander',
			'description' => "The Group Commander is in charge of all things related to his group's fighters. As well, the group commander is responsible for all the personnel assigned to the group on the ship, base or vessel and ensuring that maintenance work is carried on the craft by Engineering.",
			'department_id' => 8,
			'order' => 0,
			'available' => 1,
		],
		[
			'name' => 'Wing Commander',
			'description' => "The Wing Commander is in charge of all things related to his wing's fighters. As well, the wing commander is responsible for all the personnel assigned to the flight on the ship, base or vessel and ensuring that maintenance work is carried on the craft by Engineering.\r\n\r\nReports to the Group Commander. If the Wing Commander is the senior starfighter pilot assigned to the ship, base or vessel, they report to the Commanding Officer.",
			'department_id' => 8,
			'order' => 1,
			'available' => 1,
		],
		[
			'name' => 'Squadron Leader',
			'description' => "The Squadron Leader is in charge of all things related to his squadron's fighters. As well, the squadron leader is responsible for all the personnel assigned to the squadron on the ship, base or vessel and ensuring that maintenance work is carried on the craft by Engineering.\r\n\r\nReports to the Wing Commander. If the Squadron Leader is the senior starfighter pilot assigned to the ship, base or vessel, they report to the Commanding Officer.",
			'department_id' => 8,
			'order' => 2,
			'available' => 2,
		],
		[
			'name' => 'Flight Leader',
			'description' => "The Flight Leader is in charge of all things related to his flight's fighters. As well, the flight leader is responsible for all the personnel assigned to the flight on the ship, base or vessel and ensuring that maintenance work is carried on the craft by Engineering.\r\n\r\nReports to the Squadron Leader. If the Flight Leader is the senior starfighter pilot assigned to the ship, base or vessel, they report to the Commanding Officer.",
			'department_id' => 8,
			'order' => 3,
			'available' => 2,
		],
		[
			'name' => 'Fighter Pilot',
			'description' => "Specialized pilot trained in all areas and aspects of fighter combat. They are also familiar with runabouts, shuttles and transports. To be a fighter pilot the pilot must hold a rank from within the Warrant Officer Ranks or commissioned ranks.",
			'department_id' => 8,
			'order' => 4,
			'available' => 4,
		],
		[
			'name' => 'Tactical Systems Operator',
			'description' => "The Tactical Systems Operator (or TSO) is responsible for operating all offensive and defensive systems in fighters which have two operators. This frees the pilot to handle only the operation of the fighter. Most TSOs are also trained as pilots, for circumstances when the main pilot of the fighter is incapacitated or killed but the craft is still servicable. The TSO answers to the Flight Leader, and is generally subordinate to the Fighter Pilot operating his/her craft.",
			'department_id' => 8,
			'order' => 5,
			'available' => 4,
		],
			
		[
			'name' => 'Emissary',
			'description' => "The Emissary of the Prophets is a pivotal figure in the Bajoran religion who, according to prophecy, can speak to the Prophets and would save Bajor by finding the Celestial Temple. The Emissary has the authority to perform several Bajoran ceremonies and blessings, and is often looked to by the people for guidance.",
			'department_id' => 9,
			'order' => 0,
			'available' => 1,
		],
		[
			'name' => 'Vedek',
			'description' => "Vedeks are established members within Bajoran religion. Not all sit on the Vedek Assembly; one had to be selected to join the ranks. Vedeks are among the highest religious positions a Bajoran can attain.",
			'department_id' => 9,
			'order' => 1,
			'available' => 5,
		],
		[
			'name' => 'Ranjen',
			'description' => "Ranjen monks are a rank within the Bajoran religious system, falling between Prylars and Vedeks. The role of ranjen varied from advisors to sermonizers, and were often seen serving the Kai.",
			'department_id' => 9,
			'order' => 2,
			'available' => 10,
		],
		[
			'name' => 'Prylar',
			'description' => "Prylars are considered monks within the Bajoran religious establishment. They are able to hold services, and also assist vedeks and other higher-ranking members of the religious orders.",
			'department_id' => 9,
			'order' => 3,
			'available' => 20,
		],
		
		[
			'name' => 'Kai of Bajor',
			'description' => "The Kai is the religious leader of the Bajorans, elected from among and by the Vedek Assembly to a life term. A symbol of strength and unity, the Kai's religious authority is rivaled only by that of the Emissary to the Prophets.\r\n\r\nBesides religious power, the Kai also has a great deal of political influence in the Bajoran government. Disputes between the Kai and the First Minister of the government, while rare, can be extremely divisive. While it is not forbidden for the Kai to server as First Minister, such involvement in political matters is discouraged.",
			'department_id' => 10,
			'order' => 0,
			'available' => 1,
		],
		[
			'name' => 'Vedek',
			'description' => "Vedeks are established members within Bajoran religion. Not all sit on the Vedek Assembly; one had to be selected to join the ranks. Vedeks are among the highest religious positions a Bajoran can attain.",
			'department_id' => 10,
			'order' => 1,
			'available' => 5,
		],
	],

	'rankGroups' => [
		['name' => 'Flag Officers', 'order' => 0],
		['name' => 'Command', 'order' => 1],
		['name' => 'Engineering', 'order' => 2],
		['name' => 'Security', 'order' => 3],
		['name' => 'Medical', 'order' => 4],
	],

	'rankInfo' => [
		['name' => 'General', 'short_name' => 'GEN', 'order' => 0],
		['name' => 'Lieutenant General', 'short_name' => 'LT GEN', 'order' => 1],
		['name' => 'Major General', 'short_name' => 'MAJ GEN', 'order' => 2],
		['name' => 'Brigadier General', 'short_name' => 'BRG GEN', 'order' => 3],
		['name' => 'Colonel', 'short_name' => 'COL', 'order' => 4],
		['name' => 'Lieutenant Colonel', 'short_name' => 'LT COL', 'order' => 5],
		['name' => 'Major', 'short_name' => 'MAJ', 'order' => 6],
		['name' => 'Captain', 'short_name' => 'CAPT', 'order' => 7],
		['name' => '1st Lieutenant', 'short_name' => '1LT', 'order' => 8],
		['name' => '2nd Lieutenant', 'short_name' => '2LT', 'order' => 9],
	],

	'ranks' => [
		['group_id' => 1, 'info_id' => 1, 'order' => 0, 'base' => 'left/grey2.png', 'overlay' => 'left/o6a.png'],
		['group_id' => 1, 'info_id' => 2, 'order' => 1, 'base' => 'left/grey2.png', 'overlay' => 'left/o5a.png'],
		['group_id' => 1, 'info_id' => 3, 'order' => 2, 'base' => 'left/grey2.png', 'overlay' => 'left/o4.png'],
		['group_id' => 1, 'info_id' => 4, 'order' => 3, 'base' => 'left/grey2.png', 'overlay' => 'left/o3.png'],

		['group_id' => 2, 'info_id' => 5, 'order' => 0, 'base' => 'right/red1.png', 'overlay' => 'right/o6.png'],
		['group_id' => 2, 'info_id' => 6, 'order' => 1, 'base' => 'right/red1.png', 'overlay' => 'right/o5.png'],
		['group_id' => 2, 'info_id' => 7, 'order' => 2, 'base' => 'right/red1.png', 'overlay' => 'right/o4.png'],
		['group_id' => 2, 'info_id' => 8, 'order' => 3, 'base' => 'right/red1.png', 'overlay' => 'right/o3.png'],
		['group_id' => 2, 'info_id' => 9, 'order' => 4, 'base' => 'right/red1.png', 'overlay' => 'right/o2.png'],
		['group_id' => 2, 'info_id' => 10, 'order' => 5, 'base' => 'right/red1.png', 'overlay' => 'right/o1.png'],

		['group_id' => 3, 'info_id' => 6, 'order' => 0, 'base' => 'right/green.png', 'overlay' => 'right/o5.png'],
		['group_id' => 3, 'info_id' => 7, 'order' => 1, 'base' => 'right/green.png', 'overlay' => 'right/o4.png'],
		['group_id' => 3, 'info_id' => 8, 'order' => 2, 'base' => 'right/green.png', 'overlay' => 'right/o3.png'],
		['group_id' => 3, 'info_id' => 9, 'order' => 3, 'base' => 'right/green.png', 'overlay' => 'right/o2.png'],
		['group_id' => 3, 'info_id' => 10, 'order' => 4, 'base' => 'right/green.png', 'overlay' => 'right/o1.png'],

		['group_id' => 4, 'info_id' => 6, 'order' => 0, 'base' => 'right/brown.png', 'overlay' => 'right/o5.png'],
		['group_id' => 4, 'info_id' => 7, 'order' => 1, 'base' => 'right/brown.png', 'overlay' => 'right/o4.png'],
		['group_id' => 4, 'info_id' => 8, 'order' => 2, 'base' => 'right/brown.png', 'overlay' => 'right/o3.png'],
		['group_id' => 4, 'info_id' => 9, 'order' => 3, 'base' => 'right/brown.png', 'overlay' => 'right/o2.png'],
		['group_id' => 4, 'info_id' => 10, 'order' => 4, 'base' => 'right/brown.png', 'overlay' => 'right/o1.png'],

		['group_id' => 5, 'info_id' => 6, 'order' => 0, 'base' => 'right/medical.png', 'overlay' => 'right/o5.png'],
		['group_id' => 5, 'info_id' => 7, 'order' => 1, 'base' => 'right/medical.png', 'overlay' => 'right/o4.png'],
		['group_id' => 5, 'info_id' => 8, 'order' => 2, 'base' => 'right/medical.png', 'overlay' => 'right/o3.png'],
		['group_id' => 5, 'info_id' => 9, 'order' => 3, 'base' => 'right/medical.png', 'overlay' => 'right/o2.png'],
		['group_id' => 5, 'info_id' => 10, 'order' => 4, 'base' => 'right/medical.png', 'overlay' => 'right/o1.png'],
	],

];
