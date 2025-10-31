-- Migration script to update existing url_shortener database with new features
-- Run this if you already have the urls table created

-- Add new columns to existing urls table
ALTER TABLE urls 
ADD COLUMN IF NOT EXISTS expires_at TIMESTAMP NULL DEFAULT NULL,
ADD COLUMN IF NOT EXISTS last_accessed TIMESTAMP NULL DEFAULT NULL;
