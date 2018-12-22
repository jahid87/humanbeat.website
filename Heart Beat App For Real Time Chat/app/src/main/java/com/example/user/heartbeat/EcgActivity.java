package com.example.user.heartbeat;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

public class EcgActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ecg);
        getSupportActionBar().hide();
    }
}
