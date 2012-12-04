-- Database update for 3.0.6

ALTER TABLE DIDRoute add printer VARCHAR(100);
ALTER TABLE Modems add printer VARCHAR(100);

