Live Video Broadcast Demo
=========================

This project is a demo for the [live video broadcast bundle](https://github.com/Martin1982/live-broadcast-bundle). The same prerequisites as the bundle-project apply. 

To install;

* Clone this repository
* Run `composer install`
* Run the Doctrine schema update `bin/console doctrine:schema:update --force`
* Run `bin/console server:run`

The admin console will now be reachable at; http://localhost:8000/admin

Networks which require additional configuration are described below.

## Enable Facebook live

Create a Facebook application at https://developers.facebook.com/ with the following permissions:

- user_videos
- user_events
- user_managed_groups
- manage_pages
- publish_actions
- Live-Video API

Edit the `app/config/config.yml` with the following configuration:

    live_broadcast:
        facebook:
            application_id: YourFacebookAppId
            application_secret: YourFacebookAppSecret

Add your Facebook app id to the Twig globals in the config:

    twig:
        globals:
            live_broadcast_facebook_app_id: 'YourFacebookAppId'
    
## Enable YouTube live streaming

Create a new 'YouTube Data API v3 Client' at https://console.developers.google.com

Edit the `app/config/config.yml` with the following configuration:

    live_broadcast:
        youtube:
            client_id: YourGoogleOauthClientId
            client_secret: YourGoogleOauthClientSecret
            redirect_route: admin_martin1982_livebroadcast_channel_basechannel_youtubeoauth

The route `admin_martin1982_livebroadcast_channel_basechannel_youtubeoauth` is provided out of the box to set the route for Sonata Admin.

If you're using Sonata like this demo, add the Sonata block to login to Google;

    sonata_block:
        blocks:
            sonata.block.service.youtubeauth:
                contexts:   [admin]