<?php
$companyName = 'Latitude 21 Resorts';
$companyPhone = '1-855-770-5270';
$companyAddress = 'Mty, N.L.';

$data['mInfo']=$this->user;

?>
<div class="clearfix"></div>
<div class="container">
    <div id="TabbedPanels1" class="TabbedPanels">
        <ul class="TabbedPanelsTabGroup">
            <li class="TabbedPanelsTab" tabindex="0">Agreement</li>
        </ul>

        <div class="TabbedPanelsContentGroup">
            <div class="TabbedPanelsContent TabbedPanelsContentVisible">

                <div class="box2" style="border: solid 0px #CCCCCC;">
                    <div class="row" style="text-align:left">
                        <div class="col-lg-12">
                            <h3>
                                Welcome <?php echo $data['mInfo']['first_name'].' '.$data['mInfo']['last_name'];?>
                            </h3>
                            <h4>
                                Please read and mark that you agree to the following
                            </h4>
                        </div>
                    </div>
                    <div class="row" style="text-align:left">
                        <div class="col-lg-12" id="agree_section"
                             accesskey="" style="margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;height: 300px;overflow: scroll;overflow-x: hidden;border: solid 1px #CCCCCC;">
                            <h3><?php echo $data['mInfo']['company'];?> Subscription Agreement</h3>
                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">Terms of Use</h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                Hello New Subscriber.  <?php echo $companyName;?> ("<?php echo $data['mInfo']['company'];?>")
                                operates this web site located at http://www.<?php echo $_SERVER['HTTP_HOST'];?> (also referred
                                to as "the Web Site") to provide information and an online marketplace for the resale and rental
                                of timeshares, vacation intervals, and vacation club, deeded, and right-to-use properties
                                (all of which are referred to as "Timeshares") to potential buyers and renters. The Web Site,
                                information, tools, features and functionality provided by <?php echo $data['mInfo']['company'];?>
                                are referred to together and separately as "the Service(s)."
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">1. Acceptance of this Agreement</h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                This statement of Terms of Use (referred to as the "Agreement") describes the terms on which you may
                                access and use the Service, and it constitutes a binding agreement - and the only agreement - between
                                <?php echo $data['mInfo']['company'];?> and you governing your use of the Service. By visiting the Web Site,
                                you agree to be bound by all of the terms and conditions of this Agreement. Please note that we may modify the
                                AGREEMENT from time to time, with or without notice. Any modifications will be posted on this page and will become effective upon posting,
                                so we suggest you return to this page on a regular basis to view the AGREEMENT. Your continued use of the
                                Web Site and the Service after any modification will mean you agree to the AGREEMENT as modified. If you
                                do not agree to a modification, you should stop visiting the Web Site immediately. It is important to
                                understand that the AGREEMENT relate only to your use of the Service described here, and if you receive
                                other services from <?php echo $data['mInfo']['company'];?> or its affiliates, including but not limited
                                to our Broker Assist and Rental Assist services or additional ad-enhancement features, those additional
                                services will be subject to their own or additional terms and conditions and agreements (referred to as
                                the "Other <?php echo $data['mInfo']['company'];?> Agreements"). In the event of any inconsistency,
                                ambiguity, or disagreement between the AGREEMENT and the terms of Other <?php echo $data['mInfo']['company'];?>
                                Agreements, then the terms of the other <?php echo $data['mInfo']['company'];?> Agreements will govern.
                                <br/><br/>
                                You may not accept this Agreement nor use the Service if you are not of a legal age to form a binding
                                contract with <?php echo $data['mInfo']['company'];?>. If you accept this Agreement, you represent that you have the capacity to be bound
                                by it or if you are acting on behalf of a company, corporation, organization or other entity (referred
                                to in the singular as a "Company" and in the plural as "Companies"), that you have the authority to bind such Company.
                                <br/>
                                <br/>
                                If you do not agree to the AGREEMENT and thus, this Agreement, please do not access the Web Site or use the Service.
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                2. Privacy Policy
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                Your use of the Web Site is subject to our <a href="/privacy-policy.php" target="_blank">Privacy Policy</a>. That policy explains
                                how <?php echo $data['mInfo']['company'];?> treats your personal information and protects your privacy
                                when you access the Web Site and use the Service. Your acceptance of the AGREEMENT is also your consent to the information practices in our Privacy Policy.
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                3. Our Services to Those Re-Selling or Renting Timeshares
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                Because transactions in Timeshares and other real estate interests often involve several parties,
                                each with different roles, we want to be clear about the services <?php echo $data['mInfo']['company'];?> provides.
                                <?php echo $data['mInfo']['company'];?> is an advertising company focused on
                                resales and rentals of Timeshares.
                                By advertising a large number of Timeshares and leveraging our expertise in search engine marketing,
                                we are able to provide maximum online exposure to people interested in Timeshare purchases and vacation rentals.
                                <?php echo $data['mInfo']['company'];?> posts information on this Web Site that you provide regarding your vacation
                                property (referred to as "Advertiser Content"), along with pertinent resort information.
                                We will forward all inquiries about your Timeshare directly to you, and you may then negotiate the
                                sale/rental of your Timeshare without further involvement of <?php echo $data['mInfo']['company'];?>.
                                <br/><br/>
                                <?php echo $data['mInfo']['company'];?> advertises its Service through various advertising media,
                                and attracts buyers/renters to the Web Site or invites them to contact us directly for information.
                                We do not specifically advertise your Timeshare in our advertising programs.
                                Your Timeshare is presented through the Web Site only, and not on advertisements
                                of <?php echo $data['mInfo']['company'];?>'s Service.  Your advertising service will
                                continue until the timeshare is sold and/or rented and for as long as your subscription
                                is active, mainly that you have logged into the site within the last 60 days and that
                                your annual subscription renewal is current and paid.
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                <?php echo $data['mInfo']['company'];?> does NOT provide any of the following services to Advertisers:
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                            <ul style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                <li>
                                    We do not appraise or provide guidance regarding the value or
                                    rental price of your Timeshare. The sales or rental price of your
                                    Timeshare is established by you, the owner, and we do not advise
                                    on whether a price needs to be changed in order to maximize the
                                    likelihood of sale or rental. We cannot and do not make any
                                    representations as to the likelihood of success of the ad you
                                    place on the Web Site, the purchase/rental offer(s) that you may
                                    receive, or the period of time it will take to sell or rent your Timeshare.
                                    The marketing period and sales/rental price are determined by market
                                    conditions, and the size, location, resort, amenities,
                                    and week that you desire to sell/rent.
                                </li>
                                <li>
                                    We do not identify specific buyers or renters.
                                </li>
                                <li>
                                    We do not monitor individual advertisements or views per ad.
                                </li>
                                <li>
                                    We do not screen or qualify potential buyers or renters who respond to ads.
                                    Your interactions with persons interested in your advertised property are
                                    at your own risk, and we caution you to take appropriate security measures.
                                </li>
                                <li>
                                    We do not personally assist you in the sale/rental of your Timeshare,
                                    including (but not limited to) showing your property, other than by posting
                                    on this Web Site the property descriptions and photographs provided by you, our Advertiser.
                                    However, our staff can and will assist potential buyers/renters in identifying
                                    Timeshares from Advertiser Content that match each buyer/renter's stated requirements.
                                    In doing so, we do not recommend one advertised property over another.
                                </li>
                                <li>
                                    We are not affiliated with your resort or any third party organization,
                                    and other than through our Assist programs (referenced below), we do not
                                    take part in any negotiation for sale or rent of a Timeshare.
                                    You will be negotiating directly with the potential buyer/renter for the sales/rental price.
                                </li>
                                <li>
                                    We do not process the transfer of ownership.
                                </li>
                            </ul>
                            If you choose, you may elect additional types and levels of service from <?php echo $data['mInfo']['company'];?>,
                            which include:
                            <ul style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                <li>
                                    Our Broker Assist program, by which resale agents of (<?php echo $companyName;?>),
                                    assist in screening and negotiating with prospective buyers;
                                </li>
                                <li>
                                    Our Rental Assist program, by which rental agents of (<?php echo $companyName;?>),
                                    which is an affiliate and partner of <?php echo $data['mInfo']['company'];?>, screen offers to rent your Timeshare and assist in completing rental transactions;
                                </li>
                            </ul>
                            </p>


                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                4. Our Services to Those Wishing to Buy or Rent Timeshares; Cancellation Rights
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                The Web Site provides an easily searchable virtual marketplace of
                                Timeshares located throughout the world. We forward your inquiries about
                                specific vacation properties directly to the Advertiser, with whom
                                you may then negotiate the purchase/rental of the vacation property.
                                You may also book a rental more readily by using our Rental Assist Service,
                                which means that you may rent receive assistance from one of our rental
                                agents in selecting and renting the timeshare vacation that fits your
                                needs as closely as possible.
                                We do not recommend booking an entire vacation until you receive written
                                confirmation from the interval owner that the vacation rental has been secured.
                                <br/><br/>
                                Once you have provided payment for a rental of a timeshare, through our
                                Rental Assist Service, we are typically able to provide an e-mail confirmation of
                                the rental within five (5) business days of your booking a property
                                through the Web Site. If you have not received a confirmation of your
                                rental via e-mail, first check your "spam" or "junk" folder to verify
                                that it has not been misdirected, and if still not found, please contact
                                us as provided in the Contact Information Section below. Renters are
                                advised to contact the resort at which a booked Timeshare is located,
                                within five (5) business days of receiving our confirmation e-mail,
                                to confirm that the Timeshare is as described in the <?php echo $data['mInfo']['company'];?> listing.
                                If we do not hear from you by 5 PM (EST) of the fifth business
                                day following delivery of our confirmation e-mail, you will be
                                deemed to have accepted the Timeshare rental.
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                <?php echo $data['mInfo']['company'];?> does NOT provide any of the following services to prospective buyers and renters of Timeshares:
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                            <ul style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                <li>
                                    We do not endorse, recommend, or guarantee any property presented
                                    on the Web Site, and the inclusion of any property on the Web Site
                                    should not be considered to be an endorsement, recommendation, or guarantee.
                                </li>
                                <li>
                                    We assume no responsibility, and are not liable, for the condition of any property presented on the Web Site.
                                </li>
                                <li>
                                    We do not verify Advertiser Content. The information presented on the Web Site
                                    regarding any property is presented "as is," as an advertisement submitted to us
                                    by a person or entity offering the property for sale or rent. We do not investigate,
                                    and make no guarantee, explicit or implied, as to whether the information
                                    presented is correct and accurate. The Advertisers who offer properties through
                                    <?php echo $data['mInfo']['company'];?> are solely responsible for the accuracy of their ads,
                                    including information about physical features of properties, services and amenities,
                                    and the advertisers' rights in the properties offered for sale or rental;
                                    and prospective buyers and renters are solely responsible for verifying the
                                    accuracy of information presented, before completing any transaction regarding a Timeshare.
                                </li>
                                <li>
                                    We do not guarantee the safety or security of any Timeshare location.
                                    We recommend that before purchasing, renting, or traveling to any vacation
                                    destination, the purchaser or renter verify the level of risk by consulting
                                    newspapers, online sources, and travel and safety advisories issued by the various government resources.
                                </li>
                            </ul>
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                5. Rights and Licenses in the Web Site
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                <?php echo $data['mInfo']['company'];?> is the owner of this Web Site as a whole,
                                including its "look and feel" (e.g., text, graphics, images, logos and button icons),
                                photographs, editorial content, notices, software
                                (including html-based computer programs) and other material;
                                and individual contents of the Web Site belong or are licensed to
                                <?php echo $data['mInfo']['company'];?> or its software or content suppliers.
                                All content is protected under the copyright and intellectual property laws
                                of the United States of Mexico and other countries.
                                <br/><br/>
                                <?php echo $data['mInfo']['company'];?> grants you a limited, personal,
                                nontransferable, non-sublicensable, revocable license to access and use
                                the Web Site only as expressly permitted in these AGREEMENT.
                                Except for this limited license, we do not grant you any other
                                rights or license with respect to this Web Site; any rights or
                                license not expressly granted herein are reserved.
                                You may display and, unless otherwise noted, download and
                                print out the content of this Web Site solely for your own personal,
                                non-commercial use, and not to provide services to a third party.
                                Any redistribution, retransmission or publication of any copyrighted
                                material is strictly prohibited without the express written consent
                                of the copyright owner. You agree not to change or delete any Web Site content,
                                including copyright notices from materials downloaded or printed from the Web Site.
                                <br/><br/>
                                Except as provided above, you may not, with regard to the Web Site or any
                                portion thereof, including Advertiser Content (as defined in Section 3 above):
                            <ul style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                <li>
                                    Copy, reproduce, upload, post, display, republish, distribute, transmit, any material in any form whatsoever;
                                </li>
                                <li>
                                    Use any framing or border technique to enclose the Web Site or any portion of the Web Site;
                                </li>
                                <li>
                                    Mirror or replicate or reverse engineer any portion of the Web Site; or
                                </li>
                                <li>
                                    Modify, translate into any language or computer language, or create derivative works from, any part of the Web Site.
                                </li>
                            </ul>
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                6. Other Limitations
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                Unless otherwise provided within the Terms of Use, you may not:
                            <ul style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                <li>
                                    Place false or misleading information on the Web Site;
                                </li>
                                <li>
                                    Use the Web Site to make any false, fraudulent, or speculative claims or reservations;
                                </li>
                                <li>
                                    Imply in any way that <?php echo $data['mInfo']['company'];?> is endorsing your property, products, or services;
                                </li>
                                <li>
                                    Post or transmit any unlawful, threatening, libelous, defamatory,
                                    obscene, indecent, inflammatory, pornographic or profane material
                                    or any material that could constitute or encourage conduct that
                                    would be considered a criminal offense, give rise to civil liability,
                                    or otherwise violate any law; or for any other purpose that is
                                    unlawful or prohibited by the AGREEMENT;
                                </li>
                                <li>
                                    Use or access the Web Site in any way that may or does,
                                    in <?php echo $data['mInfo']['company'];?>'s sole judgment,
                                    adversely affect the performance or function of the Web Site,
                                    or any other computer systems or networks used by <?php echo $data['mInfo']['company'];?>
                                    or other Web Site users;
                                </li>
                                <li>
                                    Upload or transmit to the Web Site or use any device, software or
                                    routine that contains viruses, Trojan horses, worms, time bombs,
                                    or other computer programming routines that may damage, interfere
                                    or attempt to interfere with, intercept, the normal operation of
                                    the Web Site, or appropriate the Web Site or any system, or take
                                    any action that imposes an unreasonable load on our computer equipment,
                                    or that infringes upon the rights of a third party; or
                                </li>
                                <li>
                                    Disguise the origin of the information transmitted through the Web Site.
                                </li>
                            </ul>
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                7. Other parties and web sites; relationships formed through the <?php echo $data['mInfo']['company'];?> Service
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                From time to time, <?php echo $data['mInfo']['company'];?> may make available
                                to you certain services offered by third parties, or pages of the
                                Web Site may include links to other parties' web sites. <?php echo $data['mInfo']['company'];?>
                                does not endorse, warrant, or guarantee the products or services
                                available through these third parties, and is not an agent or broker
                                or otherwise responsible for the activities or policies of those web sites.
                                Third party services and web sites are not governed by this
                                AGREEMENT and/or by <?php echo $data['mInfo']['company'];?>'s Privacy Policy,
                                but may be governed by other terms of use and privacy policies. Also,
                                <?php echo $data['mInfo']['company'];?> does not review all the content
                                of these external web sites, and is not responsible for the quality of
                                information on any of the external web sites or any link contained in the external web sites.
                                <br/><br/>
                                You agree that any transaction you enter into or attempt to enter
                                into with a property owner whom you contact through the Service is
                                between you and that property owner alone, and not with <?php echo $data['mInfo']['company'];?>.
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                8. Advertisers' Warranties
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                In advertising your Timeshare with <?php echo $data['mInfo']['company'];?>
                                for posting on the Web Site, you warrant that:
                            <ul style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                <li>
                                    you hold all property rights necessary to convey the rights offered for sale or rental;
                                </li>
                                <li>
                                    any maintenance fees and other fees regarding your Timeshare are paid in full in a timely manner through the date of sale or rental;
                                </li>
                                <li>
                                    you are in good standing with all other parties relative to the property, including but not limited to the resort managing the property; and
                                </li>
                                <li>
                                    there are no liens or other obstructions that would prevent the fulfillment of any transaction for which you are using the Service.
                                </li>
                            </ul>
                            These warranties are a continuing obligation, and you agree to notify <?php echo $data['mInfo']['company'];?>  promptly of any changes to your situation.
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                9. Termination; Advertisement Term and Refund
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                You agree that <?php echo $data['mInfo']['company'];?> may remove your
                                advertisement from the Web Site and/or terminate your account and access
                                to the Service, for reasons that include but are not limited to the
                                following: (a) breaches or violations of the AGREEMENT or other
                                <?php echo $data['mInfo']['company'];?> Agreements or guidelines,
                                (b) requests by law enforcement or other government agencies,
                                (c) a request by you, (d) unexpected technical issues or problems,
                                (e) extended periods of inactivity for 60 days or more, and
                                (f) nonpayment of any fees owed by you in connection with the Service.
                                You agree that all removals or terminations shall be made in
                                <?php echo $data['mInfo']['company'];?>'s sole discretion and that
                                <?php echo $data['mInfo']['company'];?> shall not be liable to you
                                or any third party for any such action. You understand and agree that
                                <?php echo $data['mInfo']['company'];?> is not required to give notice
                                of removal or termination, but that if notice is given, it may be sent
                                to the e-mail address or other contact address you provided to
                                <?php echo $data['mInfo']['company'];?>. Your Timeshare advertisement
                                with <?php echo $data['mInfo']['company'];?> will remain on the Web
                                Site until: (a) terminated in accordance with the terms above,
                                (b) renewed by you, or (c) your Timeshare is sold or rented.
                                <br/><br/>
                                For those wishing to rent their Timeshare, all sales are final and refunds are not available.
                                <br/><br/>
                                You understand and acknowledge that Profeco's 5-day "Cooling-Off Rule"
                                regarding cancellations of sales made at homes or at certain other
                                locations does not apply to the transactions conducted through this Web Site.
                                If you discover errors in your Advertiser Content, whether introduced
                                by you or by <?php echo $data['mInfo']['company'];?>, please contact us immediately.
                                Errors in Advertiser Content will not be considered grounds for a refund.
                                Please take this into account prior to choosing to advertise your
                                Timeshare on our Web Site.
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                10. Advertisers' Indemnity
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                You agree to indemnify and hold <?php echo $data['mInfo']['company'];?>
                                and its subsidiaries, affiliates, officers, agents, employees, partners,
                                and licensors harmless from any claim or demand, including reasonable attorneys'
                                fees incurred by <?php echo $data['mInfo']['company'];?> or others,
                                due to or arising out of Advertiser Content you submit, post, transmit
                                or otherwise make available through the Web Site, your use of the Web
                                Site or any other <?php echo $data['mInfo']['company'];?> Service,
                                your connection to the Web Site, your breach of any warranties or
                                other provision of this Agreement, or your violation of any rights of another.
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                11. Disputes; Governing Law
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                You are solely responsible for your interactions with other users of the Service.
                                <?php echo $data['mInfo']['company'];?> reserves the right, but has no obligation,
                                to monitor or take action regarding disputes between parties.
                                In the event of disputes, <?php echo $data['mInfo']['company'];?> may in its
                                sole discretion take such action, as it deems appropriate, including
                                but not limited to suspending or terminating any party's ability
                                to access the Web Site, and removing any Advertiser Content.
                                <br/><br/>
                                This Agreement and your relationship with <?php echo $data['mInfo']['company'];?>
                                under this Agreement shall be governed by the laws of the courts of the United
                                States of Mexico, without regard to its conflict or choice of laws provisions.
                                Any dispute with <?php echo $data['mInfo']['company'];?>, or its officers,
                                directors, employees, agents or affiliates, arising under or in relation
                                to this Agreement shall be resolved exclusively through the courts of the
                                United States of Mexico, except with respect to imminent harm requiring
                                temporary or preliminary injunctive relief in which case <?php echo $data['mInfo']['company'];?>
                                may seek such relief in any court with jurisdiction over the parties.
                                You understand that, in return for agreement to this provision,
                                <?php echo $data['mInfo']['company'];?> is able to offer the Service at
                                the terms designated, and that your assent to this provision is an
                                indispensable consideration to this Agreement.
                            </p>
                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                12. Disclaimer of Warranties
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                <?php echo $data['mInfo']['company'];?> makes no warranty of any kind
                                regarding the Web Site, Advertiser Content, the Service, or any
                                Timeshares or properties listed with us, all of which are provided
                                on an "as is" basis. We expressly disclaim any representation or
                                warranty that the Web Site will be free from errors,
                                viruses or other harmful components, that communications
                                to or from the Web Site will be secure and not intercepted,
                                that the Service and other capabilities offered from the Web Site
                                will be uninterrupted, or that the material on the Web Site,
                                including Advertiser Content, will be accurate, complete, or timely.
                                The information, software, products, and services provided on and
                                through this Web Site may include inaccuracies or errors, including
                                pricing errors. In particular, we do not guarantee the accuracy of,
                                and disclaim all liability for, any errors or inaccuracies relating
                                to the information and description of any Timeshare listed on the
                                Web Site (including, without limitation, the pricing, photographs,
                                list of amenities, and general description), which information is
                                provided by our Advertisers.
                                <br/><br/>
                                OTHER THAN THOSE WARRANTIES WHICH, UNDER THE LAWS APPLICABLE TO THESE TERMS,
                                ARE INCAPABLE OF EXCLUSION, RESTRICTION OR MODIFICATION,
                                <?php echo $data['mInfo']['company'];?> EXPRESSLY DISCLAIMS ALL
                                WARRANTIES AND CONDITIONS, INCLUDING IMPLIED WARRANTIES AND CONDITIONS
                                OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, NON-INFRINGEMENT,
                                AND THOSE ARISING BY STATUTE OR OTHERWISE IN LAW OR FROM A COURSE OF
                                DEALING OR USAGE OF TRADE. WE MAKE NO REPRESENTATIONS ABOUT THE
                                SUITABILITY OF THE INFORMATION, SOFTWARE, PRODUCTS, AND SERVICES
                                CONTAINED ON THIS WEB SITE FOR ANY PURPOSE, AND THE INCLUSION OR
                                OFFERING OF ANY PRODUCTS OR SERVICES ON THIS WEB SITE DOES NOT
                                CONSTITUTE ANY ENDORSEMENT OR RECOMMENDATION OF SUCH PRODUCTS OR SERVICES.
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                13. Limitations of Liability
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                You expressly understand and agree that <?php echo $data['mInfo']['company'];?>
                                and its subsidiaries, affiliates, officers, employees, agents, partners and
                                licensors shall not be liable to you for any direct, indirect, incidental,
                                special, consequential, punitive or exemplary damages, including, but not limited to,
                                damages for loss of profits, goodwill, use, data or other intangible losses
                                (even if <?php echo $data['mInfo']['company'];?> has been advised of the
                                possibility of any such damages), resulting from:
                                (1) the use or the inability to use the Web Site;
                                (2) the cost of procurement of substitute goods and services resulting
                                from any goods, data, information or services purchased or obtained or
                                messages received or transactions entered into through or from the Web Site;
                                (3) unauthorized access to or alteration of your transmissions or data;
                                (4) statements or conduct of any third party on the Web Site;
                                (5) any computer viruses, linked sites, products and services obtained
                                through the Web Site; or
                                (6) any other matter relating to the Web Site or <?php echo $data['mInfo']['company'];?>.
                                In particular, you expressly understand and agree that our Advertisers
                                are not affiliated with, controlled, or monitored by <?php echo $data['mInfo']['company'];?>.
                                Accordingly, we shall not be liable for the acts or omissions of Advertisers,
                                whether such liability is purported to be based in contract, tort, negligence, strict liability, or otherwise.
                                <br/><br/>
                                To the extent permitted by law, <?php echo $data['mInfo']['company'];?>
                                shall not be liable for any damages resulting from owner or Advertiser
                                cancellations, quarantine, government restraints, weather, terrorism,
                                or causes beyond our control. <?php echo $data['mInfo']['company'];?> shall
                                not be liable for any breach of warranty by an Advertiser, including
                                but not limited to implied warranties of fitness for a particular
                                purpose (including any liability in tort) as to any products or
                                services listed by Advertisers on the Web Site. <?php echo $data['mInfo']['company'];?>
                                shall not be liable for any Advertiser or owner failure to comply
                                with this Agreement or the terms of any other Agreement between the
                                Advertiser or owner and <?php echo $data['mInfo']['company'];?>,
                                nor for any owner's failure to comply with applicable laws or resort
                                rules regarding the Timeshares presented on the Web Site.
                                <br/><br/>
                                Some states do not allow the limitation or exclusion of liability for
                                incidental or consequential damages under certain circumstances, so
                                some of the above limitations of liability may not apply to you.
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                14. Miscellaneous
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                If any portion of this Agreement is deemed unlawful, void or unenforceable
                                by any arbitrator or court of competent jurisdiction, this Agreement
                                as a whole shall not be deemed unlawful, void, or unenforceable,
                                but only that portion of this Agreement that is unlawful, void, or
                                unenforceable shall be stricken from this Agreement.
                                <br/><br/>
                                You agree that if <?php echo $data['mInfo']['company'];?> does not
                                exercise or enforce any legal right or remedy which is contained in
                                the Agreement (or to which we are entitled under any applicable law),
                                this will not be deemed to be a waiver of <?php echo $data['mInfo']['company'];?>'s
                                rights and that those rights or remedies will still be available to us.
                                <br/><br/>
                                All covenants, agreements, representations and warranties made in this
                                Agreement shall survive your acceptance of this Agreement and the
                                termination of this Agreement.
                                <br/><br/>
                                Subject to the other <?php echo $data['mInfo']['company'];?> Agreements
                                (as described in Section 1 above), this Agreement represents the entire
                                understanding and agreement between you and <?php echo $data['mInfo']['company'];?>
                                regarding the subject matter of the same, and supersedes all other previous agreements.
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                15. Contact Information
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                If you have any questions or concerns about this Web Site, our Service,
                                or this AGREEMENT, you may contact <?php echo $data['mInfo']['company'];?>
                                at info@<?php echo $_SERVER['HTTP_HOST'];?> or telephone us toll-free at
                                <?php echo $companyPhone;?> or through written agreement to <?php echo $companyAddress;?>.
                            </p>
                            <br/>
                            <br/>
                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                Subscription Agreement
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                This “Agreement” is entered on <?php echo date('d M, Y h:ia');?>, between
                                www.<?php echo $_SERVER['HTTP_HOST'];?> (“Website”)  via its agent,
                                <?php echo $companyName;?> (“us”, “we”, “our”) and <?php echo $data['mInfo']['first_name'].' '.$data['mInfo']['last_name'];?>
                                (“you”, “your”, “Subscriber”). You desire to subscribe to www.<?php echo $_SERVER['HTTP_HOST'];?>,
                                said subscription also includes the ability to advertise and market for sale,
                                rent, or both, The Timeshare Ownership(s) described on the Ad Service Description Sheet.
                            </p>


                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                Protecting and respecting your rights is very important to Us
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                This document serves as your contract. When you type "I Agree" and submit
                                this document back to us, you have entered into a contract with us for
                                a subscription including timeshare resale and/or timeshare rental advertising
                                services as described herein. As part of your subscription you will receive
                                the numerous benefits referenced in your Ad Service Description Sheet which
                                is incorporated herein. These benefits include the ability to advertise on www.<?php echo $_SERVER['HTTP_HOST'];?>.
                                The cost for this service is included in the Subscription price of
                                $ (price of subscription), and has already been paid.
                                Your only additional cost for this program is a modest annual renewal fee.
                            </p>


                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                Advertising Your Timeshare
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                Your advertisement will appear on the Website within 3-4 business
                                days of receipt of payment and delivery of all pertinent information
                                related to your particular ownership.
                                Throughout the sales process you will receive communication from us,
                                so please be sure to periodically check your email account related to
                                this advertisement and, more importantly, check your spam folder or
                                enable our domain extensions <?php echo $_SERVER['HTTP_HOST'];?> within your email
                                account settings to ensure email delivery.
                                The subscription price above and the annual renewal are the only fees
                                you will be charged to advertise your timeshare for sale and/or for rent
                                by owner on the Website as further described in the Terms of Use.
                            </p>

                            <h4 style="color:rgb(10,89,177);font-size: 25px;line-height: 25px;">
                                Here’s What You Can Expect as a Timeshare Owner Advertising with Us
                            </h4>
                            <p style="text-align: justify;margin-bottom: 25px;-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;">
                                We will provide you one online advertisement for each timeshare you advertise with us.
                                The ad will appear on the Website. When your timeshare sells, we ask
                                you to contact us so we can remove the ad. In the event you reach the
                                end of your advertising subscription, and your timeshare has not sold,
                                we may renew, at no charge to you, your advertisement and may continue
                                to renew monthly, until sold. Unless either party removes the advertisement,
                                your ad will be visible to all Website visitors. Your ad will include
                                information about your timeshare, and may include one or more photographs.
                                The photo(s) will not necessarily represent your specific unit.
                                <br/>
                                <br/>
                                We may also use other advertising and marketing resources, which may
                                include but are not limited to: websites, blogs, media releases,
                                and social media sites. Your specific ad may not appear on these
                                additional resource sites, as these additional resources are used to
                                drive web traffic to the site in general. Your advertising fee covers
                                any additional efforts by us to increase the website visibility and/or
                                promote timeshare resale or rental advertisements.
                                <br/>
                                <br/>
                                We desire to ensure that subscribers act fairly and honestly on the
                                website and abide by our terms and conditions. Thus, all subscribers
                                are bound by the terms and conditions published on the Website and
                                the same are incorporated herein.
                                <br/>
                            <ul style="list-style-type:decimal">
                                <li>
                                    These terms and conditions include the following representations
                                    by Subscriber: The information provided on the Ad Service Description
                                    Sheet is correct and can be relied upon by all buyers, renters,
                                    advertisers, brokers and title agents.
                                </li>
                                <li>
                                    Subscriber is the Owner(s) and/or has legal authority to market,
                                    sell, rent and transfer the Timeshare Ownership(s) on behalf of the Owner(s).
                                </li>
                                <li>
                                    This Agreement and resulting advertisement is not a guarantee of sale.
                                </li>
                                <li>
                                    We may utilize a variety of innovative mediums to advertise the
                                    Timeshare Ownership(s).
                                </li>
                                <li>
                                    Subscriber is solely responsible for the pricing, content and control
                                    of Subscriber’s advertisements and responding to any inquiries on
                                    such advertisements. The Subscriber(s) understands that inquiries
                                    are controlled solely by the Buyers and Sellers.
                                </li>
                                <li>
                                    We are not privy to all the transactions between the buyers and
                                    sellers, so we can only rely on the data voluntarily provided
                                    by our Subscribers.
                                </li>
                                <li>
                                    We and our agents do not purport to act as brokers and do not
                                    guarantee the sale of a timeshare or the locating of a buyer.
                                </li>
                                <li>
                                    Advertisement through our services does not, in any way, relieve,
                                    exempt or transfer the Subscriber responsibility for any liability
                                    to third parties such as the HOA, resort, mortgage holder, etc.
                                </li>
                                <li>
                                    Subscriber has read and agreed to all terms and conditions of this
                                    Agreement and we have answered any and all questions regarding
                                    this Agreement. Subscriber is not relying on any verbal
                                    representations and this Agreement represents all understandings
                                    and negotiations between the parties.
                                </li>
                            </ul>
                            <br/>
                            <?php echo $companyName;?> is a Mexican company duly organized and incorporated
                            in the Estados Unidos of Mexico.  Our physical location, including our phone center,
                            accounts, agents, referral partners, and corporate addresses are all in Mexico.
                            We operate solely under the laws as dictated by the ley federal de los estados unidos de mexico.
                            We are therefore not subject to the laws as dictated and enforced in the United States of America.
                            If you wish to work with a company that is subject to the laws and legal
                            system of the United States of America, we suggest that you immediately
                            discontinue use of our services and website and find a multitude of
                            timeshare ad related companies available in the United States.
                            We do, however, believe in protecting the rights of our subscribers and
                            would like to voluntarily offer the following information:
                            <p style="text-align:center;">
                                <strong>Pursuant to  Florida Statute §721.205, Subscriber understands that:</strong>
                            <ul style="list-style-type:decimal;">
                                <li>
                                    Upon the sale of a timeshare, additional cost to third parties
                                    over which we have no control may be due including resort transfer
                                    fees, title fees and costs, government recording fees and
                                    taxes. §721.205 (1)(a)1 and 2, F.S.
                                </li>
                                <li>
                                    We recommend Subscribers utilize a licensed title agency to
                                    administer the transfer of a timeshare to avoid falling victim
                                    to fraud or excessive demands by a third party.
                                </li>
                                <li>
                                    The owner of the timeshare remains obligated for all fees and
                                    costs associated with the timeshare payable to any owner association,
                                    finance company or other provider with whom the owner has
                                    contracted. §721.205(1)(a)1 and 2, F.S.
                                </li>
                                <li>
                                    Neither we nor our agents have stated or implied that we will
                                    provide direct sales or resale brokerage services other than the
                                    advertising of the Timeshare Ownership(s) for sale or rent by
                                    Subscriber. §721.205(2)(a), F.S.
                                </li>
                                <li>
                                    Neither we nor our agents have stated or implied, directly or
                                    indirectly, that we have already identified a person interested
                                    in buying or renting the timeshare resale
                                    interest. §721.205(2)(b), F.S.
                                </li>
                                <li>
                                    Neither we nor our agents have stated or implied, directly or
                                    indirectly, that sales or rentals have been achieved or generated
                                    as a result of its advertising services without providing
                                    documentation substantiating the statement. §721.205(2)(c), F.S.
                                </li>
                                <li>
                                    Neither we nor our agents have stated or implied that the timeshare
                                    has a specific resale value. §721.205(2)(d), F.S.
                                </li>
                                <li>
                                    We have not charged Subscriber's card or received any compensation
                                    for resale advertising services prior to Subscriber's written
                                    Agreement. §721.205(2)(e) and (f), F.S.
                                </li>
                            </ul>
                            <blockquote style="border:none;">
                                <strong>Our Cancellation Policy</strong>
                                <br/>
                                We will provide resale advertising services pursuant to this contract.
                                We have NOT identified any person who is interested in purchasing or
                                renting your timeshare interest, however, if we had we would need to
                                give you their contact information.
                                <br/>
                                <br/>
                                You have an unwaivable right to cancel this contract for any reason
                                within 5 days after the date you sign and pay for this contract.
                                If you decide to cancel this contract, you must notify us in writing
                                of your intent to cancel. Your notice of cancellation shall be effective
                                upon the date sent and shall be sent to:  <?php echo $companyAddress;?>
                                or to info@<?php echo $_SERVER['HTTP_HOST'];?> Your refund will be
                                made within 20 days after receipt of notice of cancellation or within
                                5 days after receipt of funds from your cleared check, whichever is later.
                                <br/>
                                <br/>
                                You are not obligated to pay us any money unless you agree to this
                                contract and sign it by typing I agree below.
                                <br/>
                                <br/>
                                IMPORTANT: Before you agree to the terms of this contract, you should
                                carefully review your original timeshare purchase contract and
                                other project documents to determine whether the developer has
                                reserved the right of first refusal or other option to purchase
                                your timeshare interest or to determine whether there are any
                                restrictions or special conditions applicable to the resale or
                                rental of your timeshare interest.
                                <br/>
                                <br/>
                                E Signature
                                <br/>
                                <?php echo $data['mInfo']['first_name'].' '.$data['mInfo']['last_name'];?>
                                <br/>
                                <?php echo date('d M, Y h:ia');?>
                                <br/>
                                <br/>
                                By entering “I Agree” below and clicking "Finish & Submit" you
                                agree to the terms above; acknowledge that you have been notified
                                of your right of cancellation; and agree that the electronic
                                signature indicated above will be your electronic representation of
                                your signature for all purposes associated with this transaction
                                and agreement to the terms herein when you use them on documents,
                                including legally binding contracts - just the same as pen-and-paper
                                signature or initials. You agree to conduct this transaction using
                                electronic signatures as your legally binding signature and acknowledge
                                your signature where indicated. In order to expedite this transaction,
                                you and we are preparing these documents electronically in compliance
                                with Mexican Federal and State electronic commerce law.

                            </blockquote>
                            </p>

                            </p>

                        </div>
                        <div style="width: 80%;margin: 0 auto;text-align:center;">
                            <!--
                            <input type="text" id="e_sign" class="form-control" style="width: 23%;margin: 0 auto;display: inline-block;"/>
                            <i class="fa fa-check"> </i><i class="fa fa-remove_red"> </i>
                            -->
                            <br/>
                            <span>(Click the I Agree button)</span>
                            <br/>
                            <a href="/activate/signed_agree/<?php echo $data['mInfo']['user_id']?>"  class="btn btn-success" id="acceptTerms_btn"
                               style="padding: 10px 60px;margin-top:10px; font-size: 18px; line-height: 21px;">
                                I Agree
                            </a>
                        </div>

                        <!--

                            <script type="text/javascript">
                                window.onbeforeunload = function(e) {
                                    return 'You havent Clicked the I Agree Button';
                                };
                            </script>-->


                    </div>
                    <br>
                </div><!--.box-->
            </div><!--.TabbedPanelsContent-->
        </div>
    </div>
</div>
