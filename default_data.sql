INSERT INTO plane_types (manufacturer, type, speed, max_range, pax,
engine_type, engine_count, hourly_cost, annual_fixed_cost, flight_crew,
cabin_crew, created, modified) VALUES ('Cessna', 'Citation CJ1', '720',
'2408', '6', 'Jet', '2', '727,00', '218000', '1', '0', '2016-05-09 09:00:00',
'2016-05-09 09:00:00'), ('Cessna', 'Citation Mustang', '620', '2366', '4',
'Jet', '2', '420,00', '107000', '1', '0', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Cessna', 'Citation CXLR', '795', '4009', '4', 'Jet', '2',
'680,00', '242400', '2', '1', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Gulfstream', 'GIV SP', '851', '7820', '8', 'Jet', '2', '2780,00', '453300',
'2', '1', '2016-05-09 09:00:00', '2016-05-09 09:00:00'), ('Bombardier',
'Global Express', '935', '12038', '8', 'Jet', '2', '3100,00', '513000', '2',
'2', '2016-05-09 09:00:00', '2016-05-09 09:00:00'), ('Piper', 'Malibu Mirage',
'394', '2491', '5', 'Turboprop', '2', '200,00', '60000', '1', '0', '2016-05-09
09:00:00', '2016-05-09 09:00:00');

INSERT INTO groups (name) VALUES ('pilot'), ('copilot'), ('attendants'),
('admin');

INSERT INTO planes (plane_name, plane_number, plane_type_id, created,modified) VALUES
('Alvid', '324332', '1', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Yngvar', '987124', '1', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Borgny', '723847', '1', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Kent', '138674', '1', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Vivaldi', '969414', '1', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Verdi', '019732', '1', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Elba', '901203', '2', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Ischia', '673947', '2', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Tizian', '121699', '2', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Botticelli', '239881', '2', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Marco', '987231', '2', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Persil', '234871', '2', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Faust', '267817', '3', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Macbeth', '564542', '3', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Nietzsche', '987123', '4', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Goethe', '578352', '4', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Schiller', '612344', '5', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Herder', '987723', '6', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Wieland', '078652', '6', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Plato', '372613', '6', '2016-05-09 09:00:00', '2016-05-09 09:00:00'),
('Kant', '762314', '6', '2016-05-09 09:00:00', '2016-05-09 09:00:00');

INSERT INTO customer_types (name) VALUES ('VIP'), ('CORP'), ('PRE');

INSERT INTO users (first_name, last_name, street, country, postal_code, username, password, group_id, status, payment, created, exit_date, email) VALUES
('David', 'Gottschalk', 'Rummelsburger Straße', 'Berlin', '10315', 'david', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'david.gottschalk@bancos.com'),
('Sebastian', 'Rosenkranz-Bunzel', 'Landsberger Allee', 'Berlin', '15315', 'sebastian', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Marcus', 'Misiak', 'Treptow Alleee', 'Hamburg', '18723', 'marcus', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Michael', 'Lindow', 'Linden Alleee', 'Oldenburg', '18323', 'michael', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Alexander', 'Lipinski', 'Meier Straße', 'Köln', '18323', 'alexander', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Petra', 'Rafen', 'Rummelsburger Straße', 'Berlin', '10315', 'petra', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Sabrina', 'Bauer', 'Landsberger Allee', 'Berlin', '15315', 'sabrina', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Julia', 'Dünnwieast', 'Treptow Alleee', 'Hamburg', '18723', 'julia', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Florian', 'Hörnicke', 'Linden Alleee', 'Oldenburg', '18323', 'florian', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Marco', 'Wendelmuth', 'Wenke Straße', 'Köln', '18323', 'marco', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Oliver', 'Worst', 'Rummelsburger Straße', 'Berlin', '10315', 'oliver', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Udo', 'Oehmig', 'Landsberger Allee', 'Berlin', '15315', 'udo', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Robert', 'Grüne', 'Treptow Alleee', 'Hamburg', '18723', 'robert', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Jörg', 'Nobody', 'Linden Alleee', 'Oldenburg', '18323', 'joerg', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Jens', 'Wichtig', 'Meier Straße', 'Köln', '18323', 'jens', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Jan', 'Günzel', 'Rummelsburger Straße', 'Berlin', '10315', 'jan', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Felix', 'Ulkig', 'Landsberger Allee', 'Berlin', '15315', 'felix', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Conny', 'Klecker', 'Treptow Alleee', 'Hamburg', '18723', 'conny', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Steffen', 'Härter', 'Linden Alleee', 'Oldenburg', '18323', 'steffen', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Claudia', 'Brünett', 'Meier Straße', 'Köln', '18323', 'claudia', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Paul', 'Manta', 'Meier Straße', 'Köln', '18323', 'alexander', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '1', '1', '43000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),

('Stephan', 'Hahn', 'Isen Straße', 'Berlin', '10315', 'stephan', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '2', '1', '30000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Simone', 'Gotsloff', 'Liebkind Allee', 'München', '43254', 'simone', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '2', '1', '30000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Lucienne', 'Dziekanaksi', 'Babyboom Straße', 'Düsseldorf', '13521', 'lucienne', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '2', '1', '30000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Peter', 'Bestpa', 'Breite Straße', 'Oldenburg', '73483', 'peter', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '2', '1', '30000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Volker', 'Eckloff', 'Platanen Allee', 'München', '17323', 'volker', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '2', '1', '30000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),

('Stephanie', 'Gottschalk', 'Rummelsburger Straße', 'Berlin', '10315', 'stephanie', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '3', '1', '25000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Kerstin', 'Pappen', 'Sigfried Straße', 'München', '43254', 'kerstin', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '3', '1', '25000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Natalie', 'Schulz', 'Nerven Straße', 'Düsseldorf', '13521', 'natalie', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '3', '1', '25000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Wulf', 'Mann', 'Hemel Brücke', 'Oldenburg', '73483', 'wulf', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '3', '1', '25000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Rainer', 'Burmann', 'Ferdinand Allee', 'München', '17323', 'rainer', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '3', '1', '25000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Andre', 'Meckel', 'Hammel Straße', 'Köln', '98712', 'andre', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '3', '1', '25000', '2016-05-11 09:00:00', null,'dummyMail@mail.de'),

('Erik', 'Enmis', 'Wönnich Straße', 'Oldenburg', '73483', 'erik', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '4', '1', '28000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Matthias', 'Röck', 'Ring Straße', 'München', '17323', 'matthias', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '4', '1', '28000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de'),
('Nicolas', 'Bastelstube', 'Görlitz Weg', 'Köln', '98712', 'nicolas', '$2y$10$F2pGkwwD0AjDVid/J.Xyhuf1.84BCD1nDJvD5WV/9/q5Dz.0NZYfK', '4', '1', '28000', '2016-05-11 09:00:00', null, 'dummyMail@mail.de');

INSERT INTO customers (customer_number,first_name, last_name, company, street, postal_code, country, customer_type_id, strike, email, status) VALUES
('83950812','Sandra', 'Lipinski', 'Siemens', 'Hohenzollerndamm 150', '14144', 'Berlin', '1', '0', 'sandra.lipinski@web.de', '1'),
('76380374','Alexander', 'Laube', '', 'Isenstraße 11', '11234', 'Berlin', '2', '0', 'alexander.laube@aol.de', '1'),
('12891468','Paul', 'Mahlendorf', '', 'Regenstraße 4', '83463', 'Köln', '3', '0', 'paul.mahlendorf@gmx.de', '1');

INSERT INTO flights (flight_number, customer_id, plane_id, start_date, end_date, status, cost_effectiv_travel_time, catering) VALUES
('XXX-83726492-F', '1', '1', '2016-05-17 18:15:00', '2016-05-17 19:20:00', '1', '123', '1'),
('XXX-18527182-F', '2', '2', '2016-05-18 04:10:00', '2016-05-18 08:25:00', '1', '456', '2');

INSERT INTO users_flights (flight_id, user_id) VALUES
 ('1', '1'),
 ('2', '1'),



INSERT INTO invoices (invoice_number ,flight_id, due_date, value, status, automatic) VALUES
('R-9038618362', '1', '2016-05-26 23:59:59', '270,00', '1','1'),
('R-2638496236', '2', '2016-05-16 23:59:59', '820,15', '1','1');

INSERT INTO airports_flights (flight_id, airport_id, flight_time, stay_duration, order_number) VALUES
('1', '340', '0', '0', '0'),
('1', '1259', '65', '0', '1'),
('2', '1555', '0', '0', '0'),
('2', '351', '110', '105', '1'),
('2', '420', '100', '0', '2');


INSERT INTO reject_reasons (reason_id, created) VALUES
('1', '2016-05-26 12:00:00'),
('2', '2016-05-27 15:00:00'),
('3', '2016-05-28 17:00:00'),
('4', '2016-05-29 18:00:00'),
('1', '2016-06-26 12:00:00'),
('2', '2016-06-27 15:00:00'),
('3', '2016-06-28 17:00:00'),
('4', '2016-06-29 18:00:00'),
('1', '2016-07-26 12:00:00'),
('2', '2016-08-27 15:00:00'),
('3', '2016-09-28 17:00:00'),
('4', '2016-08-29 18:00:00'),
('1', '2016-03-26 12:00:00'),
('2', '2016-02-27 15:00:00'),
('3', '2016-04-28 17:00:00'),
('4', '2016-05-29 18:00:00'),
('1', '2016-06-26 12:00:00'),
('2', '2016-07-27 15:00:00'),
('3', '2016-01-28 17:00:00'),
('4', '2016-02-29 18:00:00'),
('1', '2016-03-26 12:00:00'),
('2', '2016-05-27 15:00:00'),
('3', '2016-05-28 17:00:00'),
('4', '2016-05-29 18:00:00');
