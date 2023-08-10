<div class="navbar-brand-box">
    <!-- Dark Logo-->
    <a href="{{ route('administration')}}" class="logo logo-dark">
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="22">
        </span>
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="17">
        </span>
    </a>
    <!-- Light Logo-->
    <a href="{{ route('administration')}}" class="logo logo-light">
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="22">
        </span>
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="45">
        </span>
    </a>
    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
        id="vertical-hover">
        <i class="ri-record-circle-line"></i>
    </button>
</div>

<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Accueil</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse"
                    role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Tableau de board</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarDashboards">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('administration')}}" class="nav-link" data-key="t-analytics">
                                Statistiques </a>
                        </li>
                    
                        {{-- <li class="nav-item">
                            <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="dashboard-projects.html" class="nav-link" data-key="t-projects">
                                Projects </a>
                        </li>
                        <li class="nav-item">
                            <a href="dashboard-nft.html" class="nav-link" data-key="t-nft"> NFT</a>
                        </li> --}}
                    </ul>
                </div>
            </li> <!-- end Dashboard Menu -->

            {{-- <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarApps">
                    <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Apps</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarApps">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="apps-calendar.html" class="nav-link" data-key="t-calendar"> Calendar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="apps-chat.html" class="nav-link" data-key="t-chat"> Chat </a>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarEmail" class="nav-link" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarEmail" data-key="t-email">
                                Email
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarEmail">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="apps-mailbox.html" class="nav-link" data-key="t-mailbox">
                                            Mailbox </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sidebaremailTemplates" class="nav-link"
                                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                                            aria-controls="sidebaremailTemplates"
                                            data-key="t-email-templates">
                                            Email Templates
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebaremailTemplates">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="apps-email-basic.html" class="nav-link"
                                                        data-key="t-basic-action"> Basic Action </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="apps-email-ecommerce.html" class="nav-link"
                                                        data-key="t-ecommerce-action"> Ecommerce Action </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarEcommerce" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarEcommerce"
                                data-key="t-ecommerce"> Ecommerce
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarEcommerce">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="apps-ecommerce-products.html" class="nav-link"
                                            data-key="t-products"> Products </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-ecommerce-product-details.html" class="nav-link"
                                            data-key="t-product-Details"> Product Details </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-ecommerce-add-product.html" class="nav-link"
                                            data-key="t-create-product"> Create Product </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-ecommerce-orders.html" class="nav-link"
                                            data-key="t-orders"> Orders </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-ecommerce-order-details.html" class="nav-link"
                                            data-key="t-order-details"> Order Details </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-ecommerce-customers.html" class="nav-link"
                                            data-key="t-customers"> Customers </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-ecommerce-cart.html" class="nav-link"
                                            data-key="t-shopping-cart"> Shopping Cart </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-ecommerce-checkout.html" class="nav-link"
                                            data-key="t-checkout"> Checkout </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-ecommerce-sellers.html" class="nav-link"
                                            data-key="t-sellers"> Sellers </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-ecommerce-seller-details.html" class="nav-link"
                                            data-key="t-sellers-details"> Seller Details </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarProjects" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarProjects"
                                data-key="t-projects">Projects
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarProjects">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="apps-projects-list.html" class="nav-link"
                                            data-key="t-list"> List </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-projects-overview.html" class="nav-link"
                                            data-key="t-overview"> Overview </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-projects-create.html" class="nav-link"
                                            data-key="t-create-project"> Create Project </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarTasks" class="nav-link" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarTasks" data-key="t-tasks"> Tasks
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarTasks">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="apps-tasks-kanban.html" class="nav-link"
                                            data-key="t-kanbanboard"> Kanban Board </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-tasks-list-view.html" class="nav-link"
                                            data-key="t-list-view"> List View </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-tasks-details.html" class="nav-link"
                                            data-key="t-task-details"> Task Details </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarCRM" class="nav-link" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarCRM" data-key="t-crm"> CRM
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCRM">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="apps-crm-contacts.html" class="nav-link"
                                            data-key="t-contacts"> Contacts </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-crm-companies.html" class="nav-link"
                                            data-key="t-companies"> Companies </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-crm-deals.html" class="nav-link" data-key="t-deals">
                                            Deals </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-crm-leads.html" class="nav-link" data-key="t-leads">
                                            Leads </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarCrypto" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarCrypto"> Crypto
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCrypto">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="apps-crypto-transactions.html" class="nav-link"
                                            data-key="t-transactions"> Transactions </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-crypto-buy-sell.html" class="nav-link"
                                            data-key="t-buy-sell"> Buy & Sell </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-crypto-orders.html" class="nav-link"
                                            data-key="t-orders"> Orders </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-crypto-wallet.html" class="nav-link"
                                            data-key="t-my-wallet"> My Wallet </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-crypto-ico.html" class="nav-link"
                                            data-key="t-ico-list"> ICO List </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-crypto-kyc.html" class="nav-link"
                                            data-key="t-kyc-application"> KYC Application </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarInvoices" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarInvoices">
                                Invoices
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarInvoices">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="apps-invoices-list.html" class="nav-link"
                                            data-key="t-list-view"> List View </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-invoices-details.html" class="nav-link"
                                            data-key="t-details"> Details </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-invoices-create.html" class="nav-link"
                                            data-key="t-create-invoice"> Create Invoice </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarTickets" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarTickets"> Support
                                Tickets
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarTickets">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="apps-tickets-list.html" class="nav-link"
                                            data-key="t-list-view"> List View </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-tickets-details.html" class="nav-link"
                                            data-key="t-ticket-details"> Ticket Details </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarnft" class="nav-link" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarnft"
                                data-key="t-nft-marketplace">
                                NFT Marketplace
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarnft">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="apps-nft-marketplace.html" class="nav-link"
                                            data-key="t-marketplace"> Marketplace </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-nft-explore.html" class="nav-link"
                                            data-key="t-explore-now"> Explore Now </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-nft-auction.html" class="nav-link"
                                            data-key="t-live-auction"> Live Auction </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-nft-item-details.html" class="nav-link"
                                            data-key="t-item-details"> Item Details </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-nft-collections.html" class="nav-link"
                                            data-key="t-collections"> Collections </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-nft-creators.html" class="nav-link"
                                            data-key="t-creators"> Creators </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-nft-ranking.html" class="nav-link"
                                            data-key="t-ranking"> Ranking </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-nft-wallet.html" class="nav-link"
                                            data-key="t-wallet-connect"> Wallet Connect </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-nft-create.html" class="nav-link"
                                            data-key="t-create-nft"> Create NFT </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="apps-file-manager.html" class="nav-link"> <span
                                    data-key="t-file-manager">File Manager</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="apps-todo.html" class="nav-link"> <span data-key="t-to-do">To
                                    Do</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarjobs" class="nav-link" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarjobs"> <span
                                    data-key="t-jobs">Jobs</span> <span class="badge badge-pill bg-success"
                                    data-key="t-new">New</span></a>
                            <div class="collapse menu-dropdown" id="sidebarjobs">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="apps-job-statistics.html" class="nav-link"
                                            data-key="t-candidate-list"> Statistics </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sidebarJoblists" class="nav-link"
                                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                                            aria-controls="sidebarJoblists" data-key="t-job-lists">
                                            Job Lists
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarJoblists">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="apps-job-lists.html" class="nav-link"
                                                        data-key="t-list"> List
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="apps-job-grid-lists.html" class="nav-link"
                                                        data-key="t-grid"> Grid </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="apps-job-details.html" class="nav-link"
                                                        data-key="t-overview"> Overview</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sidebarCandidatelists" class="nav-link"
                                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                                            aria-controls="sidebarCandidatelists"
                                            data-key="t-candidate-lists">
                                            Candidate Lists
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarCandidatelists">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="apps-job-candidate-lists.html" class="nav-link"
                                                        data-key="t-list-view"> List View
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="apps-job-candidate-grid.html" class="nav-link"
                                                        data-key="t-grid-view"> Grid View</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-job-application.html" class="nav-link"
                                            data-key="t-application"> Application </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-job-new.html" class="nav-link" data-key="t-new-job">
                                            New Job </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-job-companies-lists.html" class="nav-link"
                                            data-key="t-companies-list"> Companies List </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-job-categories.html" class="nav-link"
                                            data-key="t-job-categories"> Job Categories</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="apps-api-key.html" class="nav-link"> <span data-key="t-api-key">API
                                    Key</span> <span class="badge badge-pill bg-success"
                                    data-key="t-new">New</span></a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarLayouts">
                    <i class="mdi mdi-view-carousel-outline"></i> <span data-key="t-layouts">Layouts</span>
                    <span class="badge badge-pill bg-danger" data-key="t-hot">Hot</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarLayouts">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="layouts-horizontal.html" class="nav-link" target="_blank"
                                data-key="t-horizontal">Horizontal</a>
                        </li>
                        <li class="nav-item">
                            <a href="layouts-detached.html" class="nav-link" target="_blank"
                                data-key="t-detached">Detached</a>
                        </li>
                        <li class="nav-item">
                            <a href="layouts-two-column.html" class="nav-link" target="_blank"
                                data-key="t-two-column">Two Column</a>
                        </li>
                        <li class="nav-item">
                            <a href="layouts-vertical-hovered.html" class="nav-link" target="_blank"
                                data-key="t-hovered">Hovered</a>
                        </li>
                    </ul>
                </div>
            </li> <!-- end Dashboard Menu --> --}}

            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Demandes</span></li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarPages">
                    <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">
                        Demandes prestations
                    </span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarPages">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ url('liste/demande_prestation')}}" class="nav-link" data-key="t-starter">Gestion des demandes</a>
                        </li>
                       
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarLanding">
                    <i class="mdi mdi-account-circle-outline"></i> <span data-key="t-landing">Devenir prestataires</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarLanding">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ url('liste/devenirprestataire')}}" class="nav-link" data-key="t-one-page">Gestion des prestataires</a>
                        </li>
                    </ul>
                </div> 
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarAuth">
                    <i class="mdi mdi-form-select"></i> <span data-key="t-forms">Devis</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarAuth">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ url('backends/devis') }}" class="nav-link" data-key="t-basic-elements">Liste Devis</a>
                        </li>

                    </ul>
                </div>
            </li>
          

            <li class="menu-title"><i class="ri-more-fill"></i> <span
                data-key="t-components">Pages</span></li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse"
                    role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
                    <i class="mdi mdi-bullhorn-variant-outline"></i> <span data-key="t-advance-ui">Témoignages
                    </span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ route('liste.temoignages')}}" class="nav-link"
                                data-key="t-sweet-alerts">Consulter</a>
                        </li>
                    </ul>
                </div>
            </li> 

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarForms">
                    <i class="mdi mdi-form-select"></i> <span data-key="t-forms">Départements</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarForms">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ url('backends/departements') }}" class="nav-link" data-key="t-basic-elements">Gestion départemments</a>
                        </li>
                    </ul>
                </div>
            </li>

             <li class="nav-item">
                <a class="nav-link menu-link" href="{{ url('backends/realisations') }}">
                    <i class="mdi mdi-puzzle-outline"></i> <span data-key="t-widgets">Réalisations</span>
                </a>
            </li> 

             {{-- <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarAuth">
                    <i class="mdi mdi-account-circle-outline"></i> <span
                        data-key="t-authentication">Repassages</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarAuth">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarSignIn"
                                data-key="t-signin"> Sign In
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarSignIn">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="auth-signin-basic.html" class="nav-link"
                                            data-key="t-basic"> Basic </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-signin-cover.html" class="nav-link"
                                            data-key="t-cover"> Cover </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarSignUp" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarSignUp"
                                data-key="t-signup"> Sign Up
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarSignUp">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="auth-signup-basic.html" class="nav-link"
                                            data-key="t-basic"> Basic </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-signup-cover.html" class="nav-link"
                                            data-key="t-cover"> Cover </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="#sidebarResetPass" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarResetPass"
                                data-key="t-password-reset">Password Reset
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarResetPass">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="auth-pass-reset-basic.html" class="nav-link"
                                            data-key="t-basic"> Basic </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-pass-reset-cover.html" class="nav-link"
                                            data-key="t-cover"> Cover </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="#sidebarchangePass" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarchangePass"
                                data-key="t-password-create">
                                Password Create
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarchangePass">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="auth-pass-change-basic.html" class="nav-link"
                                            data-key="t-basic">
                                            Basic </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-pass-change-cover.html" class="nav-link"
                                            data-key="t-cover">
                                            Cover </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="#sidebarLockScreen" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarLockScreen"
                                data-key="t-lock-screen"> Lock Screen
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarLockScreen">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="auth-lockscreen-basic.html" class="nav-link"
                                            data-key="t-basic"> Basic </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-lockscreen-cover.html" class="nav-link"
                                            data-key="t-cover"> Cover </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="#sidebarLogout" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarLogout"
                                data-key="t-logout"> Logout
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarLogout">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="auth-logout-basic.html" class="nav-link"
                                            data-key="t-basic"> Basic </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-logout-cover.html" class="nav-link"
                                            data-key="t-cover"> Cover </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarSuccessMsg" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarSuccessMsg"
                                data-key="t-success-message"> Success Message
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarSuccessMsg">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="auth-success-msg-basic.html" class="nav-link"
                                            data-key="t-basic"> Basic </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-success-msg-cover.html" class="nav-link"
                                            data-key="t-cover"> Cover </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarTwoStep" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarTwoStep"
                                data-key="t-two-step-verification"> Two Step Verification
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarTwoStep">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="auth-twostep-basic.html" class="nav-link"
                                            data-key="t-basic"> Basic </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-twostep-cover.html" class="nav-link"
                                            data-key="t-cover"> Cover </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarErrors" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarErrors"
                                data-key="t-errors"> Errors
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarErrors">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="auth-404-basic.html" class="nav-link"
                                            data-key="t-404-basic"> 404 Basic </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-404-cover.html" class="nav-link"
                                            data-key="t-404-cover"> 404 Cover </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-404-alt.html" class="nav-link" data-key="t-404-alt">
                                            404 Alt </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-500.html" class="nav-link" data-key="t-500"> 500 </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="auth-offline.html" class="nav-link"
                                            data-key="t-offline-page"> Offline Page </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div> 
            </li>  --}}


            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse"
                    role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
                    <i class="ri-phone-line"></i> <span data-key="t-advance-ui">Contacts
                    </span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="{{ url('message/contact')}}" class="nav-link"
                                data-key="t-sweet-alerts">Consulter les messages</a>
                        </li>
                    </ul>
                </div>
            </li> 

            <li class="menu-title"><i class="ri-more-fill"></i> <span
                    data-key="t-components">Réglages</span>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarUI" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarUI">
                    <i class="mdi mdi-spin mdi-cog-outline fs-22"></i> <span data-key="t-base-ui">Paramètres</span>
                </a>
                <div class="collapse menu-dropdown mega-dropdown-menu" id="sidebarUI">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">

                                
                                <li class="nav-item">
                                    <a href="{{ url('liste/prestation') }}" class="nav-link" data-key="t-alerts">Nos prestations</a>
                                </li>

            
                                <li class="nav-item">
                                    <a href="{{ route('ajout.assistance')}}" class="nav-link" data-key="t-alerts">Assistances</a>
                                </li>
                    
                    
                                <li class="nav-item">
                                    <a href="{{ route('liste.ethnie')}}" class="nav-link" data-key="t-alerts">Ethnies</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('liste.modes')}}" class="nav-link" data-key="t-badges">Modes de travail</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('ajout/diplome')}}" class="nav-link"
                                        data-key="t-buttons">Diplômes</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('ajout/alphabetisation') }}" class="nav-link" data-key="t-buttons">Alplabétisations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ajout.rencontre') }}" class="nav-link" data-key="t-buttons">Canaux de prospection</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('ajout.disponibilite') }}" class="nav-link" data-key="t-buttons">Dispobilités</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ajout.commune') }}" class="nav-link"
                                        data-key="t-carousel">Communes</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{ route('nature.piece') }}" class="nav-link"
                                        data-key="t-carousel">Nature pièces</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('backends/services')}}" class="nav-link" data-key="t-cards">Autres Services</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('ajout.about') }}" class="nav-link" data-key="t-cards">Présentation</a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{ route('activity.domaine') }}" class="nav-link" data-key="t-cards">Domaines activité</a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{ url('backends/villes') }}" class="nav-link" data-key="t-cards">Villes</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('statut') }}" class="nav-link" data-key="t-cards">Statuts</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="ui-colors.html" class="nav-link" data-key="t-colors">Colors</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-cards.html" class="nav-link" data-key="t-cards">Cards</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-carousel.html" class="nav-link"
                                        data-key="t-carousel">Carousel</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-dropdowns.html" class="nav-link"
                                        data-key="t-dropdowns">Dropdowns</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-grid.html" class="nav-link" data-key="t-grid">Grid</a>
                                </li> --}}
                            </ul>
                        </div>
                        {{-- <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ui-images.html" class="nav-link" data-key="t-images">Images</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-tabs.html" class="nav-link" data-key="t-tabs">Tabs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-accordions.html" class="nav-link"
                                        data-key="t-accordion-collapse">Accordion & Collapse</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-modals.html" class="nav-link" data-key="t-modals">Modals</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-offcanvas.html" class="nav-link"
                                        data-key="t-offcanvas">Offcanvas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-placeholders.html" class="nav-link"
                                        data-key="t-placeholders">Placeholders</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-progress.html" class="nav-link"
                                        data-key="t-progress">Progress</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-notifications.html" class="nav-link"
                                        data-key="t-notifications">Notifications</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ui-media.html" class="nav-link" data-key="t-media-object">Media
                                        object</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-embed-video.html" class="nav-link"
                                        data-key="t-embed-video">Embed Video</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-typography.html" class="nav-link"
                                        data-key="t-typography">Typography</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-lists.html" class="nav-link" data-key="t-lists">Lists</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-general.html" class="nav-link"
                                        data-key="t-general">General</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-ribbons.html" class="nav-link"
                                        data-key="t-ribbons">Ribbons</a>
                                </li>
                                <li class="nav-item">
                                    <a href="ui-utilities.html" class="nav-link"
                                        data-key="t-utilities">Utilities</a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </li>


            {{-- <li class="nav-item">
                <a class="nav-link menu-link" href="widgets.html">
                    <i class="mdi mdi-puzzle-outline"></i> <span data-key="t-widgets">Widgets</span>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarTables">
                    <i class="mdi mdi-grid-large"></i> <span data-key="t-tables">Tables</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarTables">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="tables-basic.html" class="nav-link" data-key="t-basic-tables">Basic
                                Tables</a>
                        </li>
                        <li class="nav-item">
                            <a href="tables-gridjs.html" class="nav-link" data-key="t-grid-js">Grid Js</a>
                        </li>
                        <li class="nav-item">
                            <a href="tables-listjs.html" class="nav-link" data-key="t-list-js">List Js</a>
                        </li>
                        <li class="nav-item">
                            <a href="tables-datatables.html" class="nav-link"
                                data-key="t-datatables">Datatables</a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarCharts">
                    <i class="mdi mdi-chart-donut"></i> <span data-key="t-charts">Charts</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarCharts">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="#sidebarApexcharts" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarApexcharts"
                                data-key="t-apexcharts"> Apexcharts
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApexcharts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="charts-apex-line.html" class="nav-link" data-key="t-line">
                                            Line </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-area.html" class="nav-link" data-key="t-area">
                                            Area </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-column.html" class="nav-link"
                                            data-key="t-column"> Column </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-bar.html" class="nav-link" data-key="t-bar">
                                            Bar </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-mixed.html" class="nav-link"
                                            data-key="t-mixed"> Mixed </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-timeline.html" class="nav-link"
                                            data-key="t-timeline"> Timeline </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-candlestick.html" class="nav-link"
                                            data-key="t-candlstick"> Candlstick </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-boxplot.html" class="nav-link"
                                            data-key="t-boxplot"> Boxplot </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-bubble.html" class="nav-link"
                                            data-key="t-bubble"> Bubble </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-scatter.html" class="nav-link"
                                            data-key="t-scatter"> Scatter </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-heatmap.html" class="nav-link"
                                            data-key="t-heatmap"> Heatmap </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-treemap.html" class="nav-link"
                                            data-key="t-treemap"> Treemap </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-pie.html" class="nav-link" data-key="t-pie">
                                            Pie </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-radialbar.html" class="nav-link"
                                            data-key="t-radialbar"> Radialbar </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-radar.html" class="nav-link"
                                            data-key="t-radar"> Radar </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="charts-apex-polar.html" class="nav-link"
                                            data-key="t-polar-area"> Polar Area </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="charts-chartjs.html" class="nav-link" data-key="t-chartjs"> Chartjs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="charts-echarts.html" class="nav-link" data-key="t-echarts"> Echarts
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarIcons">
                    <i class="mdi mdi-android-studio"></i> <span data-key="t-icons">Icons</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarIcons">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="icons-remix.html" class="nav-link" data-key="t-remix">Remix</a>
                        </li>
                        <li class="nav-item">
                            <a href="icons-boxicons.html" class="nav-link"
                                data-key="t-boxicons">Boxicons</a>
                        </li>
                        <li class="nav-item">
                            <a href="icons-materialdesign.html" class="nav-link"
                                data-key="t-material-design">Material Design</a>
                        </li>
                        <li class="nav-item">
                            <a href="icons-lineawesome.html" class="nav-link" data-key="t-line-awesome">Line
                                Awesome</a>
                        </li>
                        <li class="nav-item">
                            <a href="icons-feather.html" class="nav-link" data-key="t-feather">Feather</a>
                        </li>
                        <li class="nav-item">
                            <a href="icons-crypto.html" class="nav-link"> <span
                                    data-key="t-crypto-svg">Crypto SVG</span></a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarMaps" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarMaps">
                    <i class="mdi mdi-map-marker-outline"></i> <span data-key="t-maps">Maps</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarMaps">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="maps-google.html" class="nav-link" data-key="t-google">
                                Google
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="maps-vector.html" class="nav-link" data-key="t-vector">
                                Vector
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="maps-leaflet.html" class="nav-link" data-key="t-leaflet">
                                Leaflet
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse"
                    role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                    <i class="mdi mdi-share-variant-outline"></i> <span data-key="t-multi-level">Multi
                        Level</span>
                </a>
                <div class="collapse menu-dropdown" id="sidebarMultilevel">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-key="t-level-1.1"> Level 1.1 </a>
                        </li>
                        <li class="nav-item">
                            <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarAccount"
                                data-key="t-level-1.2"> Level 1.2
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarAccount">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-level-2.1"> Level 2.1 </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="sidebarCrm"
                                            data-key="t-level-2.2"> Level 2.2
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarCrm">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link" data-key="t-level-3.1">
                                                        Level 3.1 </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link" data-key="t-level-3.2">
                                                        Level 3.2 </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li> --}}

        </ul>
    </div>
    <!-- Sidebar -->
</div>

<div class="sidebar-background"></div>