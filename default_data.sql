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

INSERT INTO planes (plane_name, plane_number, plane_type_id, created,
modified) VALUES ('Alvid', '324332', '1', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Yngvar', '987124', '1', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Borgny', '723847', '1', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Kent', '138674', '1', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Vivaldi', '969414', '1', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Verdi', '019732', '1', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Elba', '901203', '2', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Ischia', '673947', '2', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Tizian', '121699', '2', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Botticelli', '239881', '2', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Marco', '987231', '2', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Persil', '234871', '2', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Faust', '267817', '3', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Macbeth', '564542', '3', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Nietzsche', '987123', '4', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Goethe', '578352', '4', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Schiller', '612344', '5', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Herder', '987723', '6', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Wieland', '078652', '6', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Plato', '372613', '6', '2016-05-09 09:00:00', '2016-05-09
09:00:00'), ('Kant', '762314', '6', '2016-05-09 09:00:00', '2016-05-09
09:00:00');

INSERT INTO customer_types (name) VALUES ('VIP'), ('CORP'), ('PRE');

-----------------------------------------------------------------------------------------------------------------

INSERT INTO users (first_name, last_name, street, country, postal_code, username, password, group_id, status, payment, created, exit_date) VALUES
('David', 'Gottschalk', 'Rummelsburger Straße', 'Berlin', '10315', 'david', 'password123', '1', '1', '5000', '2016-05-11 09:00:00', '2016-05-11 09:00:00'),
('Sebastian', 'Rosenkranz-Bunzel', 'Landsberger Alle', 'Berlin', '15315', 'sebastian', 'password123', '2', '1', '4000', '2016-05-11 09:00:00', '2016-05-11 09:00:00'),
('Marcus', 'Misiak', 'Treptow Allee', 'Berlin', '18723', 'marcus', 'password123', '3', '0', '4000', '2016-05-11 09:00:00'),
('Michael', 'Lindow', 'Linden Allee', 'Berlin', '18323', 'michael', 'password123', '4', '0', '4000', '2016-05-11 09:00:00' );

INSERT INTO customers (first_name, last_name, company, street, postal_code, country, customer_type_id, strike, email) VALUES
('Sandra', 'Lipinski', 'Siemens', 'Hohenzollerndamm 150', '14144', 'Berlin', '1', '0', 'sandra.lipinski@web.de'),
('Alexander', 'Laube', '', 'Isenstraße 11', '11234', 'Berlin', '2', '0', 'alexander.laube@aol.de'),
('Paul', 'Mahlendorf', '', 'Regenstraße 4', '83463', 'Köln', '3', '0', 'paul.mahlendorf@gmx.de');

INSERT INTO flights (flight_number, customer_id, plane_id, start_date, end_date, status) VALUES
('82376z4jhffes', '1', '1', '2016-05-17 18:15:00', '2016-05-17 19:20:00', '1'),
('hndap978dghq2', '2', '2', '2016-05-18 04:10:00', '2016-05-18 08:25:00', '1');

INSERT INTO users_flights (flight_id, user_id) VALUES
 ('1', '1'),
 ('2', '1');

INSERT INTO invoices (flight_id, blubb, value, status) VALUES
('1', '2016-05-26 23:59:59', '270,00', '1'),
('2', '2016-05-16 23:59:59', '820,15', '1');

INSERT INTO airports_flights (flight_id, airport_id, flight_time, stay_duration, order_number) VALUES
('1', '340', '0', '0', '0'),
('1', '1259', '65', '0', '1'),
('2', '1555', '0', '0', '0'),
('2', '351', '110', '105', '1'),
('2', '420', '100', '0', '2');
