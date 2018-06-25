# Zencart Analytics and Adwords Conversions
Tested with Zen Cart 1.5.5

## Important Notice
This plugin is a standalone solution for Google Analytics meant to replace any other Zen Cart plugins you might use right now. The module is not compatible with any of the other Analytics plugins so please ensure you remove them from your installation.

**Disclaimer**
Use at your own risk and please test prior to installing on a live environment. I recommend setting up a Testing Property in Google Analytics so you can observe tracking behaviour prior to deployment.

## Introduction
This module utilises the global site tag (gtag.js) JavaScript tagging framework for Google Analytics and Adwords Conversion Tracking.
If you already have a tracking ID you don't need to create a new one.

## Credits
All credits to the ec-analytics Plugin used as a basis for this plugin.

## Issues
Please report any issues you may find in GitHub:
https://github.com/kanine/zencart_analytics_and_adwords/issues

## Installation / Upgrade 
1. Unzip the plugin (or clone from GitHub
2. Copy /includes/extra_datafiles/dist-analytics_and_adwords.php to /includes/extra_datafiles/analytics_and_adwords.php
3. Edit the file /includes/extra_datafiles/analytics_and_adwords.php to include your tracking IDs (from Google Analytics and Adwords) 
4. Rename the folder '/includes/templates/YOUR_TEMPLATE' so that it matches the name of your template/theme 
5. Copy all four files from the /includes/ folder to your store keeping the same folder/directory structure as per the extracted files

## Configuration
### Analytics
Navigate to Admin > View > Ecommerce Settings > 'Enable Ecommerce'

### Adwords
Settings > Conversion Tracking > Website > Different Value per Transaction

In theory if you link Analytics and Adwords properly conversion tracking should be integrated, but this was not working reliably hence this plugin.

## Notes and References
Affilliate is populated with the chosen shipping method.
Educate yourself with the relevant privacy laws in your jurisidiction, and the jurisdiction of your customers.
Links
gtag.js - https://developers.google.com/analytics/devguides/collection/gtagjs/

