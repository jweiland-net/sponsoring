# TYPO3 Extension `sponsoring`

![Build Status](https://github.com/jweiland-net/sponsoring/workflows/CI/badge.svg)

With `sponsoring` you can create, manage and display projects/promotions like
f.e. a competition.

## 1 Features

* Create projects with its ID, description and contact person
* Assign an Organizer to a project
  * Organizer can be a simple text-field
  * You can choose an organizer out of Service BW API (EXT:service_bw2)
* Assign project to a promotion which is based on sys_category in TYPO3
* Add one or more images
* Choose from one of the default promotion types like `Money` and `Service`
  and add it to promotion value.

Currently `sponsoring` has a hard-coded dependency to EXT:service_bw2. That's why
it will only work for BW in germany.

## 2 Usage

### 2.1 Installation

#### Installation using Composer

The recommended way to install the extension is using Composer.

Run the following command within your Composer based TYPO3 project:

```
composer require jweiland/sponsoring
```

This will also install `jweiland/maps2` and `jweiland/service-bw2` as dependencies
into your TYPO3 system.

#### Installation as extension from TYPO3 Extension Repository (TER)

Download and install `sponsoring` with the extension manager module.

### 2.2 Minimal setup

1) Include the static TypoScript of the extension.
2) Create project records on a sysfolder.
3) Add sponsoring plugin on a page and select at least the sysfolder as startingpoint.
