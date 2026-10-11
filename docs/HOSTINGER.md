# Place for Stay ERP hosting

Status: fork and CI setup prepared. ERP has not been deployed; its database and owner account have not been created.

Upstream: andrewdwallo/erpsaas, branch 3.x, initial revision 565501e64ec7f59e8fbab342d4254ee6ef1202c8. Preserve the MIT notice.

## Verification
The ERP CI workflow builds frontend assets, runs PHP syntax and upstream accounting tests on disposable MySQL 8, checks dependency advisories, and packages dependencies/assets only after the gates pass. It does not deploy. Existing tests are not complete authorization or integration coverage.

## Installation requirements
- PHP 8.4 web/CLI, BCMath, Intl, required Laravel extensions, Composer, HTTPS, and cron.
- A dedicated ERP database/user; store its password only in private server configuration.
- Private application directory outside public_html. Expose only Laravel public files at the selected ERP document root.
- APP_ENV=production, APP_DEBUG=false, correct HTTPS APP_URL, a unique persistent APP_KEY, and secure sessions.
- ERP-specific deployment environment and SSH credentials, with verified pinned known_hosts. Never copy another application's .env.
- SMTP for invitations and password resets; bounded database-queue cron processing appropriate to shared hosting.

## Installation sequence
1. Confirm actual host/runtime, DNS/HTTPS, database, document root and symlink support.
2. Build and test a specific commit; resolve failed gates.
3. Back up the existing placeholder outside public_html, then install the tested artifact privately.
4. Configure private .env, writable storage/bootstrap cache, and public-file routing.
5. Run migrate --force only against the dedicated ERP database. Never use migrate:fresh on hosting.
6. Create the owner through the app's normal user/company flow with a private unique password.
7. Verify login, company/team permissions, denied unauthorized access, invoices, balanced journals and report totals before live use.

Do not run the upstream default seeder on the hosting database: it creates a publicly documented default password and fictitious accounting records.

PDF reports require wkhtmltopdf. Hostinger compatibility remains unverified; a renderer replacement is a separate tested change.

## Current blocker
Hostinger restricts cloud-browser sign-in. The existing projects' SSH checks succeeded, but those checks neither create this ERP database nor supply this fork with deployment credentials. No ERP secrets or live account have been configured.
