@include("frontend.body.header")

<body class="p-0 m-0 container-fluid">

    @include("frontend.body.navbar")

    @include("frontend.body.banner")

    @include("frontend.body.menu")

    <div class="container-fluid">
        <div class="p-12 row">
            <div class="mb-3">
                <h4>{{ GoogleTranslate::trans("1. Introduction:", app()->getLocale()) }}</h4>
                <p>
                    {{ GoogleTranslate::trans('This Privacy Policy governs the manner in which [News Media Website] collects, uses, maintains, and discloses information from users (referred to as "you" or "users") of our website. We are committed to protecting your privacy and ensuring the confidentiality of any personal information you provide to us. By accessing and using our website, you consent to the practices outlined in this Privacy Policy.', app()->getLocale()) }}
                </p>
            </div>
            <div class="mb-3">
                <h4>{{ GoogleTranslate::trans("2. Information we collect:", app()->getLocale()) }}</h4>
                <p>
                    {{ GoogleTranslate::trans("We may collect personal information from users in various ways, including but not limited to when you visit our website, register for an account, subscribe to our newsletters, submit comments or feedback, or interact with our content. The types of personal information we may collect include your name, email address, postal address, and any other information you voluntarily provide to us.", app()->getLocale()) }}
                </p>
            </div>
            <div class="mb-3">
                <h4>{{ GoogleTranslate::trans("3. How we use collected information:", app()->getLocale()) }}</h4>
                <p>
                    {{ GoogleTranslate::trans("We may use the information we collect from users for the following purposes:", app()->getLocale()) }}
                </p>
                <p>
                    {{ GoogleTranslate::trans("To personalize user experience: We may use information to understand how our users interact with our website and tailor our content to their interests.
                    To administer contests, promotions, or surveys: If you participate in any of these activities, we may use the provided information to manage the event and contact you as necessary.", app()->getLocale()) }}
                </p>
            </div>

            <div class="mb-3">
                <h4>{{ GoogleTranslate::trans("4. How we protect your information: ", app()->getLocale()) }}</h4>
                <p>
                    {{ GoogleTranslate::trans("We adopt appropriate data collection, storage, and processing practices and security measures to protect against unauthorized access, alteration, disclosure, or destruction of your personal information, username, password, transaction information, and data stored on our website.", app()->getLocale()) }}
                </p>
            </div>

            <div class="mb-3">
                <h4>{{ GoogleTranslate::trans("5. Sharing your personal information: ", app()->getLocale()) }}</h4>
                <p>
                    {{ GoogleTranslate::trans("We do not sell, trade, or rent users' personal information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our business partners, trusted affiliates, and advertisers for the purposes outlined above.", app()->getLocale()) }}
                </p>
            </div>

            <div class="mb-3">
                <h4>{{ GoogleTranslate::trans("6. Third-party websites:  ", app()->getLocale()) }}</h4>
                <p>
                    {{ GoogleTranslate::trans("Users may find advertising or other content on our website that links to the websites and services of our partners, advertisers, sponsors, licensors, and other third parties. We do not control the content or links that appear on these websites and are not responsible for their privacy practices. Browsing and interaction on any other website, including those that have a link to our website, is subject to that website's own terms and policies.", app()->getLocale()) }}
                </p>
            </div>
            <div class="mb-3">
                <h4>
                    {{ GoogleTranslate::trans("7. Contact us: ", app()->getLocale()) }}
                </h4>
                <p>
                    {{ GoogleTranslate::trans("If you have any questions about this Privacy Policy, the practices of this website, or your dealings with this site, please contact us.", app()->getLocale()) }}
                </p>
            </div>
        </div>
    </div>

    @include("frontend.body.footer")
