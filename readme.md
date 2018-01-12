<p align="center"><img width="240" src="app/res/img/logo.png"></p>

### 1. Proof of Cooperation

#### 1.1 Collaborators

- Stefan Schenk - 11881798
- Jockem Soons - 11327030
- Roos Riemersma - 11004401
- Sarah Bosscha - 11291486
- Assistent: marcel.velez1997@hotmail.com

#### 1.2 Website URL

[Webtechnieken-Voor-KI](http://agile181.science.uva.nl)

#### 1.3 Highest Possible Permissions

none

#### 1.4 Source References

none

### 2. Objective

Create a website that allows users to build a social network. Users create an account and thereby create a profile on which they can place information about themselves. A profile can always be changed by the user and is initially public, unless the user indicates that it does not want to. Users can post messages to their profile that are only visible to themselves and their friends. Users can make friends and respond to messages from friends. A request to become a friend must be honored by the receiving party.

Users can also send each other private messages.

There are also pages of companies or other topics that users can join. In principle, users can not see the content until they are friends or members. There must also be an interface for administrators. Administrators can (temporarily) put everything that users can do and also temporarily put users out of service.

### 3. Installation

Execute only if you have Windows, else move to the next step:

- Install Windows subsystem for Linux
- Install Ubuntu from the store

Install git, apache2, mysql, php7 and phpmyadmin:

    sudo apt-get install -y git lamp-server^ phpmyadmin

Enter ```root``` as password for Apache, Mysql and Phpmyadmin to keep things simple. Make a symbolic link for phpmyadmin.conf, then enable the configuration and reload apache.

    sudo ln -s /etc/phpmyadmin/apache.conf /etc/apache2/conf-available/phpmyadmin.conf
    sudo a2enconf phpmyadmin.conf
    sudo service apache2 reload

Next, navigate to your public / private ssh keys:

    cd .ssh
    ls

- ```id_rsa```
- ```id_rsa.pub```

We have to add the ssh key to Gitlab:

    cat id_rsa.pub

- ```ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQDc4F0hUXMlkxEEXPhfdj85kdNLCQW6sggkZOBejFDhxrTkDhC3NSlLiqVDaHlSz60GF/zvSq3ZhETzMkQtwLf6dckjuaOCplmYSdu9CBNobmn50wjb0LiQp1hK06rn1d/MB9y/e3vxKB6sXILoN9u2yNl/zpHqOWCRD+RU9praCzjrZyaicDwZ+kPXa8isFMTzbVelfqtlDuBJ+xI6ravdyVpi11xRzSCaMf8rV+5FBJqpHubHTxVRgcS3uAJgJjytka7S8CgilA8w1PzZdUy4ci77eRwjchV9ewkqQTplwtqRdIsUkhamHOsYl92uJRMGRnLEgawMpJLihV6B4QxD stefa@Stefan-Dell```

Copy the entire key after printing it out with cat, then go to  [https://gitlab-fnwi.uva.nl/profile/keys](https://gitlab-fnwi.uva.nl/profile/keys) and add the key to your profile. Add your name and email to git's config:

    git config --global user.name "Your Name"
    git config --global user.email you@example.com

Next, see if our project can be downloaded. Navigate to the location on your pc where you would like to save the project, then clone the project:

    cd /var/www/html
    git clone ssh://git@gitlab-fnwi.uva.nl:1337/webai18-39/project.git

A prompt may appear. After cloning the project, we need to fire up apache2 so that it can serve our website.

### 4. Run

    sudo service apache2 start

Open http://localhost in your browser.
