## Requirements

Application should display a list of country’s flags to the user in a grid format.

If the user clicks a flag an information modal / panel should display with the following information about the selected country:

- The country's name.
- The capital city.
- A list of official currencies.
- The population count.
- The 3 digit ISO code, i.e. GBR for Great Britain.
- list of official languages

Use the [rest](https://restcountries.com/) countries API to display information about different countries to a user.

All countries should be displayed to the user by default, but the user must be able to filter them via a text search input control. Also include a method to filter countries via region and / or subregion.

## Installation & Setup

### Prenote:
The project is built on a laravel homestead

Follow the instructions @https://laravel.com/docs/8.x/homestead
Complete the steps until [configuring-homestead](https://laravel.com/docs/8.x/homestead#configuring-homestead)

### Repository:

Clone this repository to a new location on your system. 

IE

`git clone https://github.com/jacokotze/flags-technical-assessment ./flags`

### Configuring the site:

Configure the homestead.yaml file to point to the project.

IE

```
folders:
    - map: .../flags
      to: /home/vagrant/flags
sites:
    - map: flags.test
      to: /home/vagrant/flags/public
```

### Hosts File

You will now need to point the homestead site to its internal vagrant IP.

Find and open your hosts file [here](https://www.howtogeek.com/howto/27350/beginner-geek-how-to-edit-your-hosts-file/) is a decent tutorial on how to do so.

Now add the lines such the vagrant machines IP points to the site:

IE

`192.168.56.56  flags.test`

### Composer

SSH into your vagrant machine and navigate to the project folder.

Run `composer install`

### Complete

You should now be able to boot up your vagrant homestead and access the flags site via `flags.test` on your local machine.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
