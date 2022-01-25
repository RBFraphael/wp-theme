const chalk = require("chalk");
const path = require("path");
const inquirer = require("inquirer");
const {pascalCase, paramCase, constantCase} = require("change-case");
const replace = require("replace-in-file");
const { log, error: logError } = console;

chalk.level = chalk.level === 0 ? 1 : chalk.level;

inquirer.prompt([
    {
        type: "input",
        name: "project_name",
        message: "Project name (e.g. \"Wordpress Beautiful Theme\")",
        filter: (val) => val.trim(),
        validate: (val) => val.length !== 0
    },
    {
        type: "input",
        name: "project_description",
        message: "Project description (e.g. \"My awesome Wordpress theme\")",
        filter: (val) => val.trim(),
        validate: (val) => val.length !== 0
    },
    {
        type: "input",
        name: "class_prefix",
        message: "Main class (e.g. \"WpBeautifulTheme\")",
        filter: (val) => pascalCase(val.trim()),
        validate: (val) => val.length !== 0
    },
    {
        type: "input",
        name: "const_prefix",
        message: "Constant prefix (e.g. \"WP_BEAUTIFUL_THEME\")",
        filter: (val) => constantCase(val.trim()),
        validate: (val) => val.length !== 0
    },
    {
        type: "input",
        name: "func_prefix",
        message: "Function prefix (e.g. \"wpbeautifultheme\")",
        filter: (val) => paramCase(val.trim()),
        validate: (val) => val.length !== 0
    },
    {
        type: "input",
        name: "text_domain",
        message: "Text domain (e.g. \"wp-beautiful-theme\")",
        filter: (val) => paramCase(val.trim()),
        validate: (val) => val.length !== 0
    },
    {
        type: "input",
        name: "author",
        message: "Author name (e.g. \"User123\")",
        filter: (val) => val.trim(),
        validate: (val) => val.length !== 0
    },
    {
        type: "input",
        name: "author_url",
        message: "Author URL (e.g. \"https://www.user123.com\")",
        filter: (val) => val.trim(),
        validate: (val) => val.length !== 0
    },
    {
        type: "input",
        name: "git_repository",
        message: "Git repository URL (e.g. \"https://github.com/user/wp-beautiful-theme\")",
        filter: (val) => val.trim().toLowerCase(),
        validate: (val) => val.length !== 0
    },
]).then((answers) => {
    const replaceSummary = {
        'Starter Theme': answers.project_name,
        'An easy to use and easy to understand Wordpress starter theme': answers.project_description,
        'StarterTheme': answers.class_prefix,
        'STARTERTHEME': answers.const_prefix,
        'startertheme': answers.func_prefix,
        'starter-theme': answers.text_domain,
        'RBFraphael': answers.author,
        'https://github.com/rbfraphael': answers.author_url,
        'https://github.com/rbfraphael/starter-theme': answers.git_repository
    };

    log("");
    log("Enqueued changes:");
    log("---------------------------");
    log(`- ${chalk.redBright("Starter Theme")} => ${chalk.greenBright(answers.project_name)}`);
    log(`- ${chalk.redBright("StarterTheme")} => ${chalk.green(answers.class_prefix)}`);
    log(`- ${chalk.redBright("STARTERTHEME")} => ${chalk.green(answers.const_prefix)}`);
    log(`- ${chalk.redBright("startertheme")} => ${chalk.green(answers.func_prefix)}`);
    log(`- ${chalk.redBright("starter-theme")} => ${chalk.green(answers.text_domain)}`);
    log("---------------------------");
    log("");
    log("Project info:");
    log("---------------------------");
    log(`Theme description: ${chalk.blueBright(answers.project_description)}`)
    log(`Theme URL/Git repository: ${chalk.blueBright(answers.git_repository)}`)
    log(`Author name: ${chalk.blueBright(answers.author)}`)
    log(`Author URL: ${chalk.blueBright(answers.author_url)}`)
    log("---------------------------");
    log("");
    log(`${chalk.yellowBright("!! WARNING !! ")} This is a one-time step. Once applied, it cannot be undone or updated automatically.`);
    log("");

    inquirer.prompt([
        {
            type: "confirm",
            default: false,
            name: "confirm",
            message: "Are you sure you wish to proceed?"
        }
    ]).then((confirm) => {
        if(!confirm.confirm){
            throw new Error("Rebrand cancelled");
        }

        log("Rebranding your project...");

        const ignoredFiles = [
            path.resolve(path.dirname(__dirname), "build"),
            path.resolve(path.dirname(__dirname), "includes/plugins"),
            path.resolve(path.dirname(__dirname), "node_modules"),
            path.resolve(path.dirname(__dirname), "assets/dist"),
            path.resolve(path.dirname(__dirname), "vendor"),
        ];
        
        const matchFiles = [
            path.resolve(path.dirname(__dirname), "style.css"),
            path.resolve(path.dirname(__dirname), "**/*.php"),
            path.resolve(path.dirname(__dirname), "**/*.md"),
            path.resolve(path.dirname(__dirname), "**/*.txt"),
            path.resolve(path.dirname(__dirname), "**/*.json"),
            path.resolve(path.dirname(__dirname), "**/*.xml"),
            path.resolve(path.dirname(__dirname), "assets/src/**/*.scss"),
            path.resolve(path.dirname(__dirname), "assets/src/**/*.js"),
            path.resolve(path.dirname(__dirname), "lang/*.pot"),
        ];

        for(const from in replaceSummary){
            var to = replaceSummary[from];

            replace.sync({
                ignore: ignoredFiles,
                files: matchFiles,
                from: new RegExp(from, 'g'),
                to
            });
        }

        log(`${chalk.greenBright("Done! :-)")}`)
    });
});