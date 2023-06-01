#!/bin/sh

cd web/themes/custom/rock
npm ci
npm run storybook:build
