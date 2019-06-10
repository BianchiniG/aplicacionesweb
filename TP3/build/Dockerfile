FROM node:carbon

# Create app directory
WORKDIR /usr/src/app

# Install app dependencies
# A wildcard is used to ensure both package.json AND package-lock.json are copied
# where available (npm@5+)
COPY package*.json ./

RUN npm install
# If you are building your code for production
# RUN npm install --only=production


EXPOSE 4200
CMD [ "npm", "start" ]



# npm WARN deprecated @angular/http@4.4.7: Switch to @angular/common/http - see https://angular.io/guide/http
# npm WARN deprecated extract-text-webpack-plugin@3.0.0: Deprecated. Please use https://github.com/webpack-contrib/mini-css-extract-plugin
# npm WARN deprecated browserslist@1.7.7: Browserslist 2 could fail on reading Browserslist >3.0 config used in other tools.
# npm WARN deprecated json3@3.3.2: Please use the native JSON object instead of JSON 3
# npm WARN deprecated hawk@3.1.3: This module moved to @hapi/hawk. Please make sure to switch over as this distribution is no longer supported and may contain bugs and critical security issues.
# npm WARN deprecated flatten@1.0.2: I wrote this module a very long time ago; you should use something else.
# npm WARN deprecated cryptiles@2.0.5: This version has been deprecated in accordance with the hapi support policy (hapi.im/support). Please upgrade to the latest version to get the best features, bug fixes, and security patches. If you are unable to upgrade at this time, paid support is available for older versions (hapi.im/commercial).
# npm WARN deprecated sntp@1.0.9: This module moved to @hapi/sntp. Please make sure to switch over as this distribution is no longer supported and may contain bugs and critical security issues.
# npm WARN deprecated boom@2.10.1: This version has been deprecated in accordance with the hapi support policy (hapi.im/support). Please upgrade to the latest version to get the best features, bug fixes, and security patches. If you are unable to upgrade at this time, paid support is available for older versions (hapi.im/commercial).
# npm WARN deprecated hoek@2.16.3: This version has been deprecated in accordance with the hapi support policy (hapi.im/support). Please upgrade to the latest version to get the best features, bug fixes, and security patches. If you are unable to upgrade at this time, paid support is available for older versions (hapi.im/commercial).

# npm notice created a lockfile as package-lock.json. You should commit this file.
# npm WARN bootstrap@4.0.0-beta requires a peer of jquery@>=3.0.0 but none is installed. You must install peer dependencies yourself.
# npm WARN bootstrap@4.0.0-beta requires a peer of popper.js@^1.11.0 but none is installed. You must install peer dependencies yourself.
# npm WARN optional SKIPPING OPTIONAL DEPENDENCY: fsevents@1.2.9 (node_modules/fsevents):
# npm WARN notsup SKIPPING OPTIONAL DEPENDENCY: Unsupported platform for fsevents@1.2.9: wanted {"os":"darwin","arch":"any"} (current: {"os":"linux","arch":"x64"})