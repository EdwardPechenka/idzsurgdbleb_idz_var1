CREATE TABLE IF NOT EXISTS nurse (
  id_nurse INTEGER PRIMARY KEY,
  name TEXT NOT NULL,
  date TEXT NOT NULL,
  department INTEGER NOT NULL,
  shift TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS ward (
  id_ward INTEGER PRIMARY KEY,
  name TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS nurse_ward (
  fid_nurse INTEGER,
  fid_ward INTEGER,
  FOREIGN KEY (fid_nurse) REFERENCES nurse (id_nurse),
  FOREIGN KEY (fid_ward) REFERENCES ward (id_ward)
);

INSERT INTO nurse (id_nurse, name, date, department, shift) VALUES
(1, 'Ivanov I.I.', '2026-06-01', 1, 'First'),
(2, 'Petrov P.P.', '2026-06-01', 2, 'Second'),
(3, 'Sidorov S.S.', '2026-06-02', 1, 'Third'),
(4, 'Kovalenko O.M.', '2026-06-02', 2, 'First');

INSERT INTO ward (id_ward, name) VALUES
(1, 'WardFirst'),
(2, 'WardSecond'),
(3, 'WardThird');

INSERT INTO nurse_ward (fid_nurse, fid_ward) VALUES
(1, 1),
(4, 1),
(4, 2),
(3, 2),
(3, 3),
(2, 1);