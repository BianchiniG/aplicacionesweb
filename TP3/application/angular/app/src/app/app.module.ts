import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { HomeComponent } from './home/home.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { SidebarComponent } from './components/sidebar/sidebar.component';
import { CardComponent } from './components/card/card.component';
import { TagComponent } from './components/tag/tag.component';
import { ModalComponent } from './components/modal/modal.component';

import { DataService } from './home/data.service';
import { ActivityComponent } from './components/activity/activity.component';

import { AgmCoreModule } from '@agm/core';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    HomeComponent,
    NavbarComponent,
    SidebarComponent,
    CardComponent,
    TagComponent,
    ModalComponent,
    ActivityComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    AgmCoreModule.forRoot({
      apiKey: 'AIzaSyADsGc7bwVlkfykI9_dGCJ2CpoaU7BqwR0'
    })
  ],
  providers: [DataService],
  bootstrap: [AppComponent]
})
export class AppModule { }
