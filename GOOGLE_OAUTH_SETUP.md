# Google OAuth Setup Guide

## Step 1: Go to Google Cloud Console
1. Visit: https://console.cloud.google.com/
2. Sign in with your Google account

## Step 2: Create or Select a Project
1. Click on the project dropdown at the top
2. Click "New Project" or select an existing project
3. Give your project a name like "Brand Influencer Connect"
4. Click "Create"

## Step 3: Enable Google+ API
1. In the left sidebar, go to "APIs & Services" > "Library"
2. Search for "Google+ API" 
3. Click on it and press "Enable"
4. Also search for "Google Identity" and enable it

## Step 4: Configure OAuth Consent Screen
1. Go to "APIs & Services" > "OAuth consent screen"
2. Choose "External" (unless you have a Google Workspace account)
3. Fill in the required information:
   - App name: "Brand Influencer Connect"
   - User support email: your email
   - Developer contact email: your email
4. Click "Save and Continue"
5. Skip "Scopes" for now, click "Save and Continue"
6. Add test users (your email addresses that will test the app)
7. Click "Save and Continue"

## Step 5: Create OAuth 2.0 Credentials
1. Go to "APIs & Services" > "Credentials"
2. Click "Create Credentials" > "OAuth 2.0 Client IDs"
3. Choose "Web application"
4. Give it a name: "Brand Influencer Connect Web"
5. Under "Authorized redirect URIs", add these URLs:
   ```
   http://localhost:8000/brand/google/callback
   http://localhost:8000/influencer/google/callback
   http://localhost:8000/admin/google/callback
   http://127.0.0.1:8000/brand/google/callback
   http://127.0.0.1:8000/influencer/google/callback
   http://127.0.0.1:8000/admin/google/callback
   ```
6. Click "Create"

## Step 6: Copy Your Credentials
After creating, you'll see a popup with:
- **Client ID**: Copy this long string (looks like: 123456789-abcdef.apps.googleusercontent.com)
- **Client Secret**: Copy this string (looks like: GOCSPX-abc123def456)

## Step 7: Update Your .env File
Replace these values in your .env file:
```
GOOGLE_CLIENT_ID=your_actual_client_id_here
GOOGLE_CLIENT_SECRET=your_actual_client_secret_here
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

## Important Notes:
- Keep your Client Secret private and secure
- For production, you'll need to verify your app with Google
- The redirect URIs must match exactly (including http/https)
- During development, your app will show a warning screen - this is normal

## Troubleshooting:
- If you get "redirect_uri_mismatch" error, check that your redirect URIs in Google Console match exactly
- If you get "invalid_client" error, double-check your Client ID and Secret
- Make sure to run `php artisan config:clear` after updating .env