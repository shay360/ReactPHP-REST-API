#! /usr/bin/env node
const commander = require('commander');
const program = new commander.Command();
const colors = require('colors');
const inquirer = require('inquirer');

program.version('1.0.0')
   .description('rpc CLI is a development tool to work with ReactPHP REST API project');

program.parse(process.argv);